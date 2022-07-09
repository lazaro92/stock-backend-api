<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            'product_id' => 1,
            'quantity' => 0,
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'quantity' => 9,
        ]);

        DB::table('stocks')->insert([
            'product_id' => 3,
            'quantity' => 25,
        ]);

        DB::table('stocks')->insert([
            'product_id' => 4,
            'quantity' => 10,
        ]);
    }
}
