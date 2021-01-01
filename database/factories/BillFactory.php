<?php

namespace Database\Factories;

use App\Models\Bill;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{

    protected $model = Bill::class;

    public function definition()
    {
        return [
            'seller_id' => Seller::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'bill_number' => $this->faker->unique()->firstName,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->randomNumber(2),
            'amount' => $this->faker->randomNumber(2),
            'billed_at' => $this->faker->dateTime,
        ];
    }
}
