<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{

    protected $model = Purchase::class;

    public function definition()
    {
        return [
            'seller_id' => Seller::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'name' => $this->faker->sentence,
            'price' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->randomNumber(2),
        ];
    }
}
