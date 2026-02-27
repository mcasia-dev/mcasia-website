<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tree = [
            'Cooking Essentials' => [
                'Canned Goods',
                'Cooking Oil',
                'Breading Mix',
                'Flour',
                'Noodles',
                'Soup Base',
                'Condiments & Sauces',
                'Pantry Staples',
            ],
            'Frozen' => [
                'Meat',
                'Seafood',
                'Vegetable',
            ],
            'Beverage' => [
                'Alcohol',
                'Dairy',
                'Powder',
                'Purse',
                'Sauce',
                'Syrup',
                'Toppings',
            ],
            'Snacks' => [],
            'Packaging Supplies' => [],
        ];

        foreach ($tree as $parentName => $children) {
            $parent = ProductCategory::updateOrCreate(
                ['slug' => Str::slug($parentName)],
                [
                    'parent_id' => null,
                    'name' => $parentName,
                    'level' => 1,
                    'sort_order' => 0,
                    'is_active' => true,
                ]
            );

            foreach ($children as $index => $childName) {
                ProductCategory::updateOrCreate(
                    ['slug' => Str::slug($parentName . ' ' . $childName)],
                    [
                        'parent_id' => $parent->id,
                        'name' => $childName,
                        'level' => 2,
                        'sort_order' => $index + 1,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
