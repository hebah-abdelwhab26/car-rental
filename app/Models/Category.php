<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cate_image',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
