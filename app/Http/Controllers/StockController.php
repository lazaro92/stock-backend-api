<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function show() {
        return DB::table('stocks')
            ->join('products', 'products.id', '=', 'stocks.product_id')
            ->get();
    }

    public function find($code) {
        return DB::table('stocks')
            ->join('products', 'products.id', '=', 'stocks.product_id')
            ->where('products.code', $code)
            ->get();
    }
}
