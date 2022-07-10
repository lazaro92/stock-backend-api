<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ProductRepository;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller {
    private $productRepository;

    public function __construct(
            ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function show() {
        $products = $this->productRepository->getAll();

        if ($products->isEmpty()) {
            return response()->json([ 'message' => 'no products found'], 404);
        }
        return $products;

    }

    public function find(Request $request) {
        $code = $request->code; 

        $product = $this->productRepository->findByCode($code);
    
        if ($product->isEmpty()) {
            return response()->json([ 'message' => 'no product found for the code ' . $code], 404);
        }
        return $product;
    }

    public function insert(ProductRequest $request) {
        $bodyContent = $request->all(); 

        $product = $this->productRepository->insert(
            $bodyContent['code'],
            $bodyContent['name'],
            $bodyContent['price'],
            $bodyContent['quantity'] ?? 0,
        );

        return $product;
    }
}
