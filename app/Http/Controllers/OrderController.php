<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Exports\OrdersExport;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /*
    |------------------------------------------
    | Admin Orders List
    |------------------------------------------
    */
    public function index()
    {
        $orders = Order::with(['user', 'product', 'payment'])
            ->latest()
            ->get();

        $monthlyOrders = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $monthlyRevenue = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        return view('orders.index', compact(
            'orders',
            'monthlyOrders',
            'monthlyRevenue'
        ));
    }

    /*
    |------------------------------------------
    | Show Single Order
    |------------------------------------------
    */
    public function show(Order $order)
    {
        $order->load([
            'user',
            'product',
            'payment'
        ]);

        return view('orders.show', compact('order'));
    }

    /*
    |------------------------------------------
    | Checkout Page
    |------------------------------------------
    */
    public function checkout(Product $product)
    {
        return view('orders.checkout', compact('product'));
    }

    /*
    |------------------------------------------
    | Create Order + Create Payment Automatically
    |------------------------------------------
    */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'start_date'     => 'required|date|after_or_equal:today',
            'end_date'       => 'required|date|after:start_date',
            'payment_method' => 'required|in:cash,card,wallet',
        ]);

        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate   = Carbon::parse($request->end_date)->startOfDay();

        /*
        |------------------------------------------------------
        | 1) Check booking conflict
        | We block booking if there is another order for the same car
        | with overlapping dates and status != cancelled
        |------------------------------------------------------
        */
        $conflictExists = Order::where('product_id', $product->id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate->toDateString(), $endDate->toDateString()])
                    ->orWhereBetween('end_date', [$startDate->toDateString(), $endDate->toDateString()])
                    ->orWhere(function ($q) use ($startDate, $endDate) {
                        $q->where('start_date', '<=', $startDate->toDateString())
                          ->where('end_date', '>=', $endDate->toDateString());
                    });
            })
            ->exists();

        if ($conflictExists) {
            return back()
                ->withInput()
                ->with('error', 'This car is already reserved for the selected dates. Please choose different dates.');
        }

        /*
        |------------------------------------------------------
        | 2) Calculate total price
        |------------------------------------------------------
        */
        $days = $startDate->diffInDays($endDate);
        $days = $days > 0 ? $days : 1;

        $totalPrice = $days * $product->daily_price;

        DB::beginTransaction();

        try {
            /*
            |------------------------------------------------------
            | 3) Create Order
            |------------------------------------------------------
            */
            $order = Order::create([
                'user_id'        => Auth::id(),
                'product_id'     => $product->id,
                'start_date'     => $startDate->toDateString(),
                'end_date'       => $endDate->toDateString(),
                'total_price'    => $totalPrice,
                'payment_method' => $request->payment_method,
                'status'         => 'pending',
            ]);

            /*
            |------------------------------------------------------
            | 4) Create Payment automatically
            |------------------------------------------------------
            */
            Payment::create([
                'order_id'        => $order->id,
                'payment_method'  => $request->payment_method,
                'amount'          => $totalPrice,
                'transaction_id'  => null,
                'payment_status'  => 'pending',
                'paid_at'         => null,
            ]);

            /*
            |------------------------------------------------------
            | 5) Notify Admins
            |------------------------------------------------------
            */
            $admins = User::where('role', 'admin')->get();

            foreach ($admins as $admin) {
                $admin->notify(new NewOrderNotification($order));
            }

            event(new OrderCreated($order));

            DB::commit();

            return redirect()
                ->route('orders.myReservations')
                ->with('success', 'Reservation created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Something went wrong while creating the reservation.');
        }
    }

    /*
    |------------------------------------------
    | Update Order Status
    |------------------------------------------
    */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        $order->update([
            'status' => trim($request->status)
        ]);

        return back()->with('success', 'Order status updated successfully.');
    }

    /*
    |------------------------------------------
    | Filter Orders
    |------------------------------------------
    */
    public function filter(Request $request)
    {
        $query = Order::with(['user', 'product', 'payment']);

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('created_at', [
                $request->from_date,
                $request->to_date
            ]);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->get();

        $monthlyOrders = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $monthlyRevenue = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        return view('orders.index', compact(
            'orders',
            'monthlyOrders',
            'monthlyRevenue'
        ));
    }

    /*
    |------------------------------------------
    | Export PDF
    |------------------------------------------
    */
    public function exportPdf()
    {
        $orders = Order::with(['user', 'product', 'payment'])->get();

        $pdf = Pdf::loadView('orders.pdf', compact('orders'));

        return $pdf->download('orders-report.pdf');
    }

    /*
    |------------------------------------------
    | Export Excel
    |------------------------------------------
    */
    public function exportExcel()
    {
        return Excel::download(new OrdersExport(), 'orders.xlsx');
    }

    /*
    |------------------------------------------
    | User Reservations
    |------------------------------------------
    */
    public function myReservations()
    {
        $orders = Order::with(['product', 'payment'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('orders.my_reservations', compact('orders'));
    }

    /*
    |------------------------------------------
    | Cancel Reservation
    |------------------------------------------
    */
    public function cancelReservation(Order $order)
    {
        if ($order->user_id != auth()->id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return back()->with('error', 'Only pending reservations can be cancelled.');
        }

        $order->update([
            'status' => 'cancelled'
        ]);

        if ($order->payment) {
            $order->payment->update([
                'payment_status' => 'failed'
            ]);
        }

        return back()->with('success', 'Reservation cancelled successfully.');
    }

    /*
    |------------------------------------------
    | Redirect from notification to order page
    | and mark notification as read
    |------------------------------------------
    */
    public function notificationRedirect($id)
    {
        $notification = auth()->user()
            ->notifications()
            ->where('id', $id)
            ->firstOrFail();

        if (is_null($notification->read_at)) {
            $notification->markAsRead();
        }

        $orderId = $notification->data['order_id'] ?? null;

        if (!$orderId) {
            return redirect()
                ->route('orders.index')
                ->with('error', 'Order not found in notification.');
        }

        return redirect()->route('orders.show', $orderId);
    }
}

