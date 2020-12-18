<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name'          => $this->faker->name,
            'description'   => $this->faker->text,
            'user_id'       => User::all()->random(1)->first()->id
        ];
    }
}
