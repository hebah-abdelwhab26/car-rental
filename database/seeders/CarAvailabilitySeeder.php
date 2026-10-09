<?php

namespace Database\Seeders;

use App\Models\CarAvailability;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CarAvailabilitySeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            $this->command?->warn(
                'No cars found. Run ProductSeeder first.'
            );

            return;
        }

        $startDate = Carbon::today();

        foreach ($products as $product) {
            for ($day = 0; $day < 60; $day++) {
                $date = $startDate->copy()->addDays($day);

                CarAvailability::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'available_date' => $date->toDateString(),
                    ],
                    [
                        'is_available' => true,
                    ]
                );
            }
        }

        $this->command?->info(
            'Availability records have been processed for the next 60 days.'
        );
    }
}
