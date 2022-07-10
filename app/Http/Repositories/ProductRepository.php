<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository 
{
    public function getAll() {
        return Product::paginate(15);
    }

    public function findByCode($code) {
        return Product:: where('code', $code)->first();
    }

    public function insert(Product $product) {
        $product->save();

        return $product;
    }
}

