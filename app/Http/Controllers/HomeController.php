<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use App\Models\Order;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // =========================
        // BASIC STATS
        // =========================
        $users = User::count();
        $products = Product::count();
        $categories = Category::count();
        $locations = Location::count();
        $orders = Order::count();
        $payments = Payment::count();

        // =========================
        // LATEST ORDERS
        // =========================
        $latestOrders = Order::with([
                'user',
                'product',
                'payment'
            ])
            ->latest()
            ->take(10)
            ->get();

        // =========================
        // LATEST PAYMENTS
        // =========================
        $latestPayments = Payment::with([
                'order.user',
                'order.product'
            ])
            ->latest()
            ->take(10)
            ->get();

        // =========================
        // COMMENTS & RATINGS
        // =========================
        $comments = Comment::with(['user', 'product'])
            ->latest()
            ->take(10)
            ->get();

        $commentsCount = Comment::count();
        $avgRating = Comment::avg('rating') ?? 0;

        // أعلى السيارات تقييماً
        $topRatedProducts = Comment::select(
                'product_id',
                DB::raw('AVG(rating) as avg_rating')
            )
            ->groupBy('product_id')
            ->orderByDesc('avg_rating')
            ->with('product')
            ->take(5)
            ->get();

        // =========================
        // ORDERS PER MONTH
        // =========================
        $monthlyOrders = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        // =========================
        // REVENUE PER MONTH
        // =========================
        $monthlyRevenue = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        // =========================
        // RETURN VIEW
        // =========================
        return view('home', compact(
            'users',
            'products',
            'categories',
            'locations',
            'orders',
            'payments',
            'latestOrders',
            'latestPayments',
            'comments',
            'commentsCount',
            'avgRating',
            'topRatedProducts',
            'monthlyOrders',
            'monthlyRevenue'
        ));
    }
}
