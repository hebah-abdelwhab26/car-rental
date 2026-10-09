<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store Comment (Frontend - User Side)
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $product->comments()->create([
            'user_id' => auth()->id(),
            'rating'  => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('message', 'Comment added successfully');
    }

    /**
     * Admin: Show all comments in a single page
     */
    public function index()
    {
        // جلب جميع التعليقات مع بيانات المستخدم والسيارة
        $comments = Comment::with(['user', 'product'])
            ->latest()
            ->get();

        // إجمالي عدد التعليقات
        $commentsCount = Comment::count();

        // متوسط التقييمات
        $avgRating = Comment::avg('rating') ?? 0;

        return view('comments.index', compact(
            'comments',
            'commentsCount',
            'avgRating'
        ));
    }

    /**
     * Admin: Delete comment
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return back()->with('message', 'Comment deleted successfully');
    }
}

