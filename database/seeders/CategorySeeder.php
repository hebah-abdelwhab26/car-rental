<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'title_en' => 'Economy',
                'title_ar' => 'اقتصادية',
                'cate_image' => 'images/categories/economy.jpg',
                'description_en' => 'Affordable and fuel-efficient cars for everyday trips.',
                'description_ar' => 'سيارات اقتصادية موفرة للوقود ومناسبة للتنقل اليومي.',
            ],
            [
                'title_en' => 'Sedan',
                'title_ar' => 'سيدان',
                'cate_image' => 'images/categories/sedan.jpg',
                'description_en' => 'Comfortable sedans for business and city driving.',
                'description_ar' => 'سيارات سيدان مريحة للقيادة داخل المدن ورحلات العمل.',
            ],
            [
                'title_en' => 'SUV',
                'title_ar' => 'دفع رباعي',
                'cate_image' => 'images/categories/suv.jpg',
                'description_en' => 'Versatile SUVs with extra space and comfort.',
                'description_ar' => 'سيارات متعددة الاستخدامات بمساحة وراحة إضافيتين.',
            ],
            [
                'title_en' => 'Family',
                'title_ar' => 'عائلية',
                'cate_image' => 'images/categories/family.jpg',
                'description_en' => 'Spacious vehicles for family trips and group travel.',
                'description_ar' => 'سيارات واسعة للرحلات العائلية والتنقل الجماعي.',
            ],
            [
                'title_en' => 'Luxury',
                'title_ar' => 'فاخرة',
                'cate_image' => 'images/categories/luxury.jpg',
                'description_en' => 'Premium vehicles combining elegance and performance.',
                'description_ar' => 'سيارات فاخرة تجمع بين الأناقة والأداء المتميز.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['title_en' => $category['title_en']],
                array_merge($category, ['status' => '1'])
            );
        }
    }
}

