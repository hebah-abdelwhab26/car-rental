<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
        'rating',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors (Optional but very useful for UI)
    |--------------------------------------------------------------------------
    */

    // إرجاع التقييم كنص نجوم جاهز
    public function getStarsAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes (Useful for admin panel)
    |--------------------------------------------------------------------------
    */

    // أحدث التعليقات أولاً
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // أعلى تقييم
    public function scopeHighestRating($query)
    {
        return $query->orderBy('rating', 'desc');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    // متوسط تقييم السيارة (لو احتجته داخل model لاحقًا)
    public static function averageForProduct($productId)
    {
        return self::where('product_id', $productId)->avg('rating') ?? 0;
    }
}
