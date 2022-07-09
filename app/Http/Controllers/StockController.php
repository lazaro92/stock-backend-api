<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Repositories\StockRepository;

class StockController extends Controller
{
    private $stockRepository;

    public function __construct(StockRepository $stockRepository) {
        $this->stockRepository = $stockRepository;
    }

    public function show() {
        $stocks = $this->stockRepository->getAll();

        if ($stocks->isEmpty()) {
            return response()->json([ 'message' => 'no stocks found'], 404);
        }
        return $stocks;

    }

    public function find($code) {
        $stock = $this->stockRepository->findByCode($code);
    
        if ($stock->isEmpty()) {
            return response()->json([ 'message' => 'no stock found for the code ' . $code], 404);
        }
        return $stock;
    }
}
