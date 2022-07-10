<?php

namespace App\Http\Repositories;

use App\Models\Movement;

class MovementRepository 
{
    public function getAll() {
        return Product::paginate(15);
    }

    public function insert($product, $operation, $quantity=0) {
        $movement = new Movement();

        $movement->product_id = $product->id;
        $movement->operation  = $operation;
        $movement->quantity   = $quantity;

        $movement->save();

        return $movement;
    }
}


