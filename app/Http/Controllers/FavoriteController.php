<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()
            ->favorites()
            ->with(['category', 'location', 'comments'])
            ->latest()
            ->get();

        return view('favorites.index', compact('favorites'));
    }

    public function toggle(Product $product)
    {
        $user = Auth::user();

        if ($user->favorites()->where('product_id', $product->id)->exists()) {
            $user->favorites()->detach($product->id);
            return back()->with('message', 'Removed from favorites successfully');
        } else {
            $user->favorites()->attach($product->id);
            return back()->with('message', 'Added to favorites successfully');
        }
    }
}
