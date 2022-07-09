<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository 
{
    public function insert($name, $code, $price=0) {
        $product = new Product();
        $product->name  = $name;
        $product->code  = $code;
        $product->price = $price;

        $product->save();

        return $product;
    }
}


