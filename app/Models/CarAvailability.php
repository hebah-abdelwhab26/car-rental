<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarAvailability extends Model
{
    use HasFactory;

    protected $table = 'car_availability';

    protected $fillable = [
        'product_id',
        'available_date',
        'is_available'
    ];

    protected $casts = [
        'available_date' => 'date',
        'is_available' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
