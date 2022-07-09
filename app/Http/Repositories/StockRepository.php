<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Stock;

class StockRepository 
{
    public function getAll() {
        return DB::table('stocks')
            ->join('products', 'products.id', '=', 'stocks.product_id')
            ->paginate(15);
    }

    public function findByCode($code) {
        return DB::table('stocks')
            ->join('products', 'products.id', '=', 'stocks.product_id')
            ->where('products.code', $code)
            ->get();
    }

    public function insert($productId, $quantity=0) {
        $stock = new Stock();
        $stock->product_id = $productId;
        $stock->quantity   = $quantity;

        $stock->save();

        return $stock;
    }
}

