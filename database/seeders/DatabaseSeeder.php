<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        $this->call([
            ClientSeeder::class,
            ItemSeeder::class,
            SupplierSeeder::class,
            WarehouseSeeder::class,
            StockSeeder::class,
        ]);
    }
}
