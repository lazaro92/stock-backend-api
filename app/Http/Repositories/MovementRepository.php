<?php

namespace App\Http\Repositories;

use App\Models\Movement;

class MovementRepository 
{
    public function getAll() {
        return Movement::paginate(15);
    }

    public function findById($id) {
        return Movement::find($id);
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


