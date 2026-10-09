<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = Category::pluck('id', 'title_en');
        $locations = Location::orderBy('id')->get();

        if ($categoryIds->isEmpty() || $locations->isEmpty()) {
            $this->command?->error(
                'Please seed categories and locations before products.'
            );

            return;
        }

        $cars = [
            // Economy
            [
                'name' => 'Toyota Yaris',
                'brand' => 'Toyota',
                'model' => 'Yaris',
                'year' => 2024,
                'color' => 'Red',
                'category' => 'Economy',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 140,
                'weekly_price' => 850,
                'monthly_price' => 2900,
                'deposit_amount' => 500,
                'image' => 'images/cars/economy/toyota-yaris-2024-red.jpg',
                'description' => 'Compact and economical car, ideal for daily city driving.',
            ],
            [
                'name' => 'Hyundai Accent',
                'brand' => 'Hyundai',
                'model' => 'Accent',
                'year' => 2024,
                'color' => 'Blue',
                'category' => 'Economy',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 150,
                'weekly_price' => 900,
                'monthly_price' => 3100,
                'deposit_amount' => 500,
                'image' => 'images/cars/economy/hyundai-accent-2024-blue.jpg',
                'description' => 'Practical sedan with comfortable seating and efficient fuel consumption.',
            ],
            [
                'name' => 'Kia Pegas',
                'brand' => 'Kia',
                'model' => 'Pegas',
                'year' => 2023,
                'color' => 'Red',
                'category' => 'Economy',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 135,
                'weekly_price' => 800,
                'monthly_price' => 2750,
                'deposit_amount' => 500,
                'image' => 'images/cars/economy/kia-pegas-red.jpg',
                'description' => 'Budget-friendly compact sedan for everyday transportation.',
            ],
            [
                'name' => 'Nissan Sunny',
                'brand' => 'Nissan',
                'model' => 'Sunny',
                'year' => 2023,
                'color' => 'Blue',
                'category' => 'Economy',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 135,
                'weekly_price' => 800,
                'monthly_price' => 2750,
                'deposit_amount' => 500,
                'image' => 'images/cars/economy/nissan-sunny-blue.jpg',
                'description' => 'Comfortable and economical sedan for city travel and commuting.',
            ],

            // Sedan
            [
                'name' => 'Toyota Corolla',
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2024,
                'color' => 'Dark Blue',
                'category' => 'Sedan',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 190,
                'weekly_price' => 1150,
                'monthly_price' => 3900,
                'deposit_amount' => 700,
                'image' => 'images/cars/sedan/toyota-corolla-2024-blue.jpg',
                'description' => 'Reliable sedan offering a balanced combination of comfort and efficiency.',
            ],
            [
                'name' => 'Hyundai Elantra',
                'brand' => 'Hyundai',
                'model' => 'Elantra',
                'year' => 2024,
                'color' => 'Pearl White',
                'category' => 'Sedan',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 200,
                'weekly_price' => 1200,
                'monthly_price' => 4100,
                'deposit_amount' => 700,
                'image' => 'images/cars/sedan/hyundai-elantra-2024-white.jpg',
                'description' => 'Modern sedan with a stylish design and a comfortable cabin.',
            ],
            [
                'name' => 'Kia K5',
                'brand' => 'Kia',
                'model' => 'K5',
                'year' => 2024,
                'color' => 'Dark Green',
                'category' => 'Sedan',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 250,
                'weekly_price' => 1500,
                'monthly_price' => 5100,
                'deposit_amount' => 800,
                'image' => 'images/cars/sedan/kia-k5-2024-green.jpg',
                'description' => 'Sporty midsize sedan with a spacious interior and refined styling.',
            ],
            [
                'name' => 'Toyota Camry',
                'brand' => 'Toyota',
                'model' => 'Camry',
                'year' => 2024,
                'color' => 'Bronze',
                'category' => 'Sedan',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 280,
                'weekly_price' => 1700,
                'monthly_price' => 5800,
                'deposit_amount' => 1000,
                'image' => 'images/cars/sedan/toyota-camry-2024-bronze.jpg',
                'description' => 'Comfortable midsize sedan suited to longer journeys and business trips.',
            ],

            // SUV
            [
                'name' => 'Hyundai Tucson',
                'brand' => 'Hyundai',
                'model' => 'Tucson',
                'year' => 2024,
                'color' => 'Red',
                'category' => 'SUV',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 300,
                'weekly_price' => 1800,
                'monthly_price' => 6200,
                'deposit_amount' => 1000,
                'image' => 'images/cars/suv/hyundai-tucson-2024-red.jpg',
                'description' => 'Versatile SUV with generous passenger space and modern styling.',
            ],
            [
                'name' => 'Kia Sportage',
                'brand' => 'Kia',
                'model' => 'Sportage',
                'year' => 2024,
                'color' => 'Orange',
                'category' => 'SUV',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 310,
                'weekly_price' => 1850,
                'monthly_price' => 6400,
                'deposit_amount' => 1000,
                'image' => 'images/cars/suv/kia-sportage-2024-orange.jpg',
                'description' => 'Contemporary SUV designed for comfortable everyday driving and trips.',
            ],
            [
                'name' => 'Toyota RAV4',
                'brand' => 'Toyota',
                'model' => 'RAV4',
                'year' => 2024,
                'color' => 'Blue',
                'category' => 'SUV',
                'transmission' => 'automatic',
                'fuel_type' => 'hybrid',
                'seats' => 5,
                'daily_price' => 350,
                'weekly_price' => 2100,
                'monthly_price' => 7200,
                'deposit_amount' => 1200,
                'image' => 'images/cars/suv/toyota-rav4-2024-blue.jpg',
                'description' => 'Practical SUV with a roomy cabin and efficient hybrid powertrain.',
            ],
            [
                'name' => 'Ford Explorer',
                'brand' => 'Ford',
                'model' => 'Explorer',
                'year' => 2024,
                'color' => 'Black',
                'category' => 'SUV',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 7,
                'daily_price' => 500,
                'weekly_price' => 3000,
                'monthly_price' => 10300,
                'deposit_amount' => 1500,
                'image' => 'images/cars/suv/ford-explorer-2024-black.jpg',
                'description' => 'Large SUV with three-row seating for family trips and group travel.',
            ],

            // Family
            [
                'name' => 'Toyota Innova',
                'brand' => 'Toyota',
                'model' => 'Innova',
                'year' => 2024,
                'color' => 'White',
                'category' => 'Family',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 7,
                'daily_price' => 320,
                'weekly_price' => 1900,
                'monthly_price' => 6500,
                'deposit_amount' => 1000,
                'image' => 'images/cars/family/toyota-innova-2024-white.jpg',
                'description' => 'Spacious family vehicle with practical seating and storage.',
            ],
            [
                'name' => 'Chevrolet Tahoe',
                'brand' => 'Chevrolet',
                'model' => 'Tahoe',
                'year' => 2024,
                'color' => 'Dark Blue',
                'category' => 'Family',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 7,
                'daily_price' => 700,
                'weekly_price' => 4200,
                'monthly_price' => 14500,
                'deposit_amount' => 2000,
                'image' => 'images/cars/family/chevrolet-tahoe-2024-blue.jpg',
                'description' => 'Full-size SUV with ample space for passengers and luggage.',
            ],
            [
                'name' => 'Hyundai Santa Fe',
                'brand' => 'Hyundai',
                'model' => 'Santa Fe',
                'year' => 2024,
                'color' => 'Olive Green',
                'category' => 'Family',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 7,
                'daily_price' => 400,
                'weekly_price' => 2400,
                'monthly_price' => 8200,
                'deposit_amount' => 1300,
                'image' => 'images/cars/family/hyundai-santa-fe-2024-green.jpg',
                'description' => 'Family-oriented SUV with a roomy interior and modern safety features.',
            ],

            // Luxury
            [
                'name' => 'BMW 5 Series',
                'brand' => 'BMW',
                'model' => '5 Series',
                'year' => 2024,
                'color' => 'Metallic Blue',
                'category' => 'Luxury',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 800,
                'weekly_price' => 4800,
                'monthly_price' => 16500,
                'deposit_amount' => 3000,
                'image' => 'images/cars/luxury/bmw-5-series-2024-blue.jpg',
                'description' => 'Premium executive sedan combining refined comfort and dynamic performance.',
            ],
            [
                'name' => 'Mercedes-Benz E-Class',
                'brand' => 'Mercedes-Benz',
                'model' => 'E-Class',
                'year' => 2024,
                'color' => 'Black',
                'category' => 'Luxury',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 850,
                'weekly_price' => 5100,
                'monthly_price' => 17500,
                'deposit_amount' => 3000,
                'image' => 'images/cars/luxury/mercedes-e-class-2024-black.jpg',
                'description' => 'Elegant luxury sedan with a premium interior and advanced technology.',
            ],
            [
                'name' => 'Genesis G80',
                'brand' => 'Genesis',
                'model' => 'G80',
                'year' => 2024,
                'color' => 'Burgundy',
                'category' => 'Luxury',
                'transmission' => 'automatic',
                'fuel_type' => 'gasoline',
                'seats' => 5,
                'daily_price' => 750,
                'weekly_price' => 4500,
                'monthly_price' => 15500,
                'deposit_amount' => 2500,
                'image' => 'images/cars/luxury/genesis-g80-2024-burgundy.jpg',
                'description' => 'Luxury sedan featuring elegant design, quiet comfort and premium appointments.',
            ],
        ];

        foreach ($cars as $car) {
            $categoryId = $categoryIds->get($car['category']);

            if (!$categoryId) {
                $this->command?->warn(
                    "Category not found: {$car['category']}"
                );

                continue;
            }

            $location = $locations->random();

            Product::updateOrCreate(
                [
                    'brand' => $car['brand'],
                    'model' => $car['model'],
                    'year' => $car['year'],
                ],
                [
                    'category_id' => $categoryId,
                    'location_id' => $location->id,
                    'name' => $car['name'],
                    'brand' => $car['brand'],
                    'model' => $car['model'],
                    'year' => $car['year'],
                    'color' => $car['color'],
                    'transmission' => $car['transmission'],
                    'fuel_type' => $car['fuel_type'],
                    'seats' => $car['seats'],
                    'description' => $car['description'],
                    'status' => '1',
                    'available' => true,
                    'daily_price' => $car['daily_price'],
                    'weekly_price' => $car['weekly_price'],
                    'monthly_price' => $car['monthly_price'],
                    'deposit_amount' => $car['deposit_amount'],
                    'image' => $car['image'],
                ]
            );
        }

        $this->command?->info('18 demo cars have been seeded successfully.');
    }
}

