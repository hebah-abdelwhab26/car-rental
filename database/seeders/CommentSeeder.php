<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();

        if (!$user) {
            $this->command->warn('Test user not found. Skipping comments.');
            return;
        }

        $comments = [
            1 => [
                'comment' => 'Great little car for driving around the city. Clean, economical, and easy to park.',
                'rating' => 5,
            ],
            2 => [
                'comment' => 'Comfortable ride and good fuel economy. The car was clean when I received it.',
                'rating' => 5,
            ],
            3 => [
                'comment' => 'Good value for money. The car was practical and suitable for everyday use.',
                'rating' => 4,
            ],
            4 => [
                'comment' => 'Smooth rental experience and a reliable car for getting around town.',
                'rating' => 4,
            ],
            5 => [
                'comment' => 'Very comfortable sedan with enough space for passengers and luggage.',
                'rating' => 5,
            ],
            6 => [
                'comment' => 'Modern interior and a smooth drive. Overall, a very good experience.',
                'rating' => 5,
            ],
            7 => [
                'comment' => 'Stylish car with good performance. I would consider renting it again.',
                'rating' => 4,
            ],
            8 => [
                'comment' => 'Comfortable on longer journeys, although fuel consumption could be better.',
                'rating' => 4,
            ],
            9 => [
                'comment' => 'A practical SUV with good visibility and plenty of room for a small family.',
                'rating' => 5,
            ],
            10 => [
                'comment' => 'Nice design and comfortable seats. The car performed well throughout the trip.',
                'rating' => 5,
            ],
            11 => [
                'comment' => 'Spacious, reliable, and suitable for weekend trips. Good overall experience.',
                'rating' => 4,
            ],
            12 => [
                'comment' => 'Powerful and spacious SUV. Parking in tight spaces can be challenging.',
                'rating' => 4,
            ],
            13 => [
                'comment' => 'A useful family vehicle with plenty of passenger space and luggage capacity.',
                'rating' => 5,
            ],
            14 => [
                'comment' => 'Very spacious and comfortable for a large group, but it is a big vehicle.',
                'rating' => 4,
            ],
            15 => [
                'comment' => 'Comfortable family SUV with a pleasant driving experience.',
                'rating' => 5,
            ],
            16 => [
                'comment' => 'Premium interior, excellent comfort, and enjoyable handling.',
                'rating' => 5,
            ],
            17 => [
                'comment' => 'Elegant and comfortable luxury sedan. The overall experience was excellent.',
                'rating' => 5,
            ],
            18 => [
                'comment' => 'Beautiful design and a refined interior. A great option for a premium trip.',
                'rating' => 5,
            ],
        ];

        foreach ($comments as $productId => $data) {
            if (!Product::whereKey($productId)->exists()) {
                continue;
            }

            Comment::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'product_id' => $productId,
                ],
                [
                    'comment' => $data['comment'],
                    'rating' => $data['rating'],
                ]
            );
        }

        $this->command->info('Comment seeder completed successfully.');
    }
}

