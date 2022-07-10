<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Collar de perlas',
            'code' => '123456',
            'price' => 200.00,
            'quantity' => 0,
        ]);

        DB::table('products')->insert([
            'name' => 'Anillo de boda',
            'code' => '123457',
            'price' => 300.00,
            'quantity' => 5,
        ]);

        DB::table('products')->insert([
            'name' => 'Pulsera de plata',
            'code' => '123458',
            'price' => 250.99,
            'quantity' => 8,
        ]);

        DB::table('products')->insert([
            'name' => 'Anillo de oro con diamantes',
            'code' => '123459',
            'price' => 1000.99,
            'quantity' => 10,
        ]);

    }
}
