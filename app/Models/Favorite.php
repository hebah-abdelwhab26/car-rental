<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// العلاقات
use App\Models\User;
use App\Models\Product;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    /**
     * المفضلة تنتمي إلى مستخدم واحد
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * المفضلة تنتمي إلى سيارة واحدة
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
