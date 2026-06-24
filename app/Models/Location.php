<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'area',
        'address',
        'latitude',
        'longitude'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
