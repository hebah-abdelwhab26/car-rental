<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// العلاقات
use App\Models\Category;
use App\Models\Location;
use App\Models\Comment;
use App\Models\CarImage;
use App\Models\Order;
use App\Models\CarAvailability;
use App\Models\Favorite;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'location_id',
        'name',
        'brand',
        'model',
        'year',
        'color',
        'transmission',
        'fuel_type',
        'seats',
        'description',
        'status',
        'available',
        'daily_price',
        'weekly_price',
        'monthly_price',
        'deposit_amount',
        'image'
    ];

    /**
     * المنتج ينتمي إلى تصنيف
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * المنتج ينتمي إلى موقع
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * تعليقات السيارة
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * صور المعرض الخاصة بالسيارة
     */
    public function images()
    {
        return $this->hasMany(CarImage::class)->orderBy('sort_order');
    }

    /**
     * الحجوزات الخاصة بالسيارة
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * التوفر حسب الأيام
     */
    public function availability()
    {
        return $this->hasMany(CarAvailability::class);
    }

    /**
     * المفضلة
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
