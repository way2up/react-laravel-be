<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'text'=> $this->faker->text,
            'price' => $this->faker->numberBetween(100, 5000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'bonus' => $this->faker->numberBetween(1, 1000),
            'product_id' => Product::all()->random(1)->first()->id,
            'creator_id' => User::all()->random(1)->first()->id,
            'editor_id' => User::all()->random(1)->first()->id,
        ];
    }
}
