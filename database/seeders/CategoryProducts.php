<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProducts extends Seeder
{
    public function run()
    {
        $categories = Category::all();

       return Product::all()->each(function (Product $product) use ($categories) {
            $product->categories()->attach(
                $categories->random(1)->pluck('id')->toArray()
            );
        });
    }
}
