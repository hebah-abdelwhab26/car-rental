<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            [
                'city' => 'Riyadh',
                'area' => 'Olaya',
                'address' => 'Demo location, Olaya District, Riyadh, Saudi Arabia',
                'latitude' => 24.7117,
                'longitude' => 46.6742,
            ],
            [
                'city' => 'Jeddah',
                'area' => 'Al Zahra',
                'address' => 'Demo location, Al Zahra District, Jeddah, Saudi Arabia',
                'latitude' => 21.5891,
                'longitude' => 39.1528,
            ],
            [
                'city' => 'Dammam',
                'area' => 'Al Faisaliyah',
                'address' => 'Demo location, Al Faisaliyah District, Dammam, Saudi Arabia',
                'latitude' => 26.3927,
                'longitude' => 50.0888,
            ],
            [
                'city' => 'Makkah',
                'area' => 'Al Aziziyah',
                'address' => 'Demo location, Al Aziziyah District, Makkah, Saudi Arabia',
                'latitude' => 21.3891,
                'longitude' => 39.8579,
            ],
            [
                'city' => 'Madinah',
                'area' => 'Central Area',
                'address' => 'Demo location, Central Area, Madinah, Saudi Arabia',
                'latitude' => 24.4672,
                'longitude' => 39.6111,
            ],
        ];

        foreach ($locations as $location) {
            Location::updateOrCreate(
                [
                    'city' => $location['city'],
                    'area' => $location['area'],
                ],
                $location
            );
        }
    }
}

