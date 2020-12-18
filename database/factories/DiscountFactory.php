<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    public function definition()
    {
        return [
            'percent'       => $this->faker->numberBetween(1, 100),
            'category_id'   => Category::all()->random(1)->first()->id
        ];
    }
}
