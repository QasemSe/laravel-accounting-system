<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use App\Models\Manager;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
//        Manager::factory(10)->create();
        Category::factory(10)->create();
        Product::factory(10)->create();
        Seller::factory(10)->create();
        Customer::factory(10)->create();
        Purchase::factory(10)->create();
    }
}
