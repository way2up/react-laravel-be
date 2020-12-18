<?php

namespace Database\Seeders;

use App\Models\ProductItem;
use Illuminate\Database\Seeder;

class ProductItemSeeder extends Seeder
{
    public function run()
    {
       return ProductItem::factory()->count(10)->create();
    }
}
