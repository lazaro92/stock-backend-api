<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\StockRepository;
use App\Http\Repositories\ProductRepository;

class StockController extends Controller
{
    private $stockRepository;
    private $productRepository;

    public function __construct(
            StockRepository $stockRepository,
            ProductRepository $productRepository
    ) {
        $this->stockRepository = $stockRepository;
        $this->productRepository = $productRepository;
    }

    public function show() {
        $stocks = $this->stockRepository->getAll();

        if ($stocks->isEmpty()) {
            return response()->json([ 'message' => 'no stocks found'], 404);
        }
        return $stocks;

    }

    public function find(Request $request) {
        $code = $request->code; 

        $stock = $this->stockRepository->findByCode($code);
    
        if ($stock->isEmpty()) {
            return response()->json([ 'message' => 'no stock found for the code ' . $code], 404);
        }
        return $stock;
    }

    public function insert(Request $request) {
        $bodyContent = $request->all(); 

        $product = $this->productRepository->insert(
            $bodyContent['name'],
            $bodyContent['code'],
            $bodyContent['price'],
        );

        if ($product) {
            return $this->stockRepository->insert($product->id, $bodyContent['quantity']);
        }
    }
}
