<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{

    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->sentence,
            'created_by' => Manager::all()->random()->id,
        ];
    }
}
