<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();

        if (!$user) {
            $this->command->warn('Test user not found. Skipping orders.');
            return;
        }

        $today = Carbon::today();

        $orders = [
            [
                'product_id' => 1,
                'start_date' => $today->copy()->subDays(20),
                'days' => 3,
                'status' => 'completed',
                'payment_method' => 'card',
            ],
            [
                'product_id' => 5,
                'start_date' => $today->copy()->subDays(14),
                'days' => 5,
                'status' => 'completed',
                'payment_method' => 'cash',
            ],
            [
                'product_id' => 9,
                'start_date' => $today->copy()->subDays(8),
                'days' => 4,
                'status' => 'completed',
                'payment_method' => 'wallet',
            ],
            [
                'product_id' => 16,
                'start_date' => $today->copy()->subDays(5),
                'days' => 2,
                'status' => 'cancelled',
                'payment_method' => 'card',
            ],
            [
                'product_id' => 3,
                'start_date' => $today->copy()->addDays(2),
                'days' => 3,
                'status' => 'confirmed',
                'payment_method' => 'card',
            ],
            [
                'product_id' => 8,
                'start_date' => $today->copy()->addDays(5),
                'days' => 4,
                'status' => 'confirmed',
                'payment_method' => 'cash',
            ],
            [
                'product_id' => 12,
                'start_date' => $today->copy()->addDays(7),
                'days' => 2,
                'status' => 'pending',
                'payment_method' => null,
            ],
            [
                'product_id' => 17,
                'start_date' => $today->copy()->addDays(12),
                'days' => 3,
                'status' => 'pending',
                'payment_method' => null,
            ],
        ];

        foreach ($orders as $data) {
            $product = Product::find($data['product_id']);

            if (!$product) {
                continue;
            }

            $startDate = $data['start_date']->copy()->startOfDay();
            $endDate = $startDate->copy()->addDays($data['days']);

            $totalPrice = (float) $product->daily_price * $data['days'];

            Order::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'start_date' => $startDate->toDateString(),
                    'end_date' => $endDate->toDateString(),
                ],
                [
                    'total_price' => round($totalPrice, 2),
                    'status' => $data['status'],
                    'payment_method' => $data['payment_method'],
                ]
            );
        }

        $this->command->info('Order seeder completed successfully.');
    }
}
