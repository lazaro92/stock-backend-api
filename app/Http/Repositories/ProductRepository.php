<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository 
{
    public function getAll() {
        return Product::paginate(15);
    }

    public function findByCode($code) {
        return Product:: where('code', $code) ->get();
    }

    public function insert($code, $name, $price, $quantity=0) {
        $product = new Product();

        $product->code     = $code;
        $product->name     = $name;
        $product->price    = $price;
        $product->quantity = $quantity;

        $product->save();

        return $product;
    }
}

