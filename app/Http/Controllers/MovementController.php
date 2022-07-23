<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Repositories\MovementRepository;
use App\Models\Movement;


class MovementController extends Controller {
    private $movementRepository;

    public function __construct(
            MovementRepository $movementRepository
    ) {
        $this->movementRepository = $movementRepository;
    }

    public function show() {
        $movements = $this->movementRepository->getAll();

        if ($movements->isEmpty()) {
            return response()->json([ 'message' => 'no movements found'], 404);
        }
        return $movements;

    }

    public function find(Request $request) {
        $id = $request->id; 

        $movement = $this->movementRepository->findById($id);
    
        if (!$movement) {
            return response()->json([ 'message' => 'no movement found for the id ' . $id], 404);
        }
        return $movement;
    }
}

