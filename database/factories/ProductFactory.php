<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'name' => $this->faker->unique()->name,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomNumber(2),
            'sale_price' => $this->faker->randomNumber(2,),
            'purchase_price' => $this->faker->randomNumber(2),
        ];
    }
}
