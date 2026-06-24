<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display all payments (Admin)
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $payments = Payment::with(['order.user', 'order.product'])
            ->latest()
            ->get();

        return view('payments.index', compact('payments'));
    }

    /*
    |--------------------------------------------------------------------------
    | Show single payment details (Admin)
    |--------------------------------------------------------------------------
    */
    public function show(Payment $payment)
    {
        $payment->load(['order.user', 'order.product']);

        return view('payments.show', compact('payment'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update payment status + sync order status
    |--------------------------------------------------------------------------
    */
    public function updateStatus(Request $request, Payment $payment)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,paid,failed',
        ]);

        $payment->payment_status = $request->payment_status;

        /*
        |--------------------------------------------------------------
        | إذا تم الدفع بنجاح:
        | - نخزن paid_at إذا لم تكن موجودة
        | - نحول الطلب إلى confirmed إذا لم يكن completed
        |--------------------------------------------------------------
        */
        if ($request->payment_status === 'paid') {
            if (!$payment->paid_at) {
                $payment->paid_at = now();
            }

            if ($payment->order && $payment->order->status !== 'completed') {
                $payment->order->update([
                    'status' => 'confirmed'
                ]);
            }
        }

        /*
        |--------------------------------------------------------------
        | إذا فشل الدفع:
        | - نمسح paid_at
        | - نحول الطلب إلى cancelled إذا لم يكن completed
        |--------------------------------------------------------------
        */
        elseif ($request->payment_status === 'failed') {
            $payment->paid_at = null;

            if ($payment->order && $payment->order->status !== 'completed') {
                $payment->order->update([
                    'status' => 'cancelled'
                ]);
            }
        }

        /*
        |--------------------------------------------------------------
        | إذا رجع الدفع إلى pending:
        | - نمسح paid_at
        | - نرجع الطلب إلى pending إذا لم يكن completed
        |--------------------------------------------------------------
        */
        elseif ($request->payment_status === 'pending') {
            $payment->paid_at = null;

            if ($payment->order && $payment->order->status !== 'completed') {
                $payment->order->update([
                    'status' => 'pending'
                ]);
            }
        }

        $payment->save();

        return back()->with('success', 'Payment status updated successfully.');
    }
}
