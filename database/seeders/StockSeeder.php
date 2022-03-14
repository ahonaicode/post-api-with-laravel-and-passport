<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;
use App\Models\Item;
use App\Models\Warehouse;
class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = Item::first();
        $warehouse = Warehouse::first();
        Stock::create(['warehouse_id'=>$warehouse->id,'item_id'=>$item->id,'stock'=>10]);
        
    }
}
