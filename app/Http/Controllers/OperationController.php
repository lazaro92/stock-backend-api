<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\MovementRepository;

class OperationController extends Controller
{
    private $productRepository;
    private $movementRepository;

    public function __construct(
            ProductRepository $productRepository,
            MovementRepository $movementRepository
    ) {
        $this->productRepository = $productRepository;
        $this->movementRepository = $movementRepository;
    }

    public function buyProduct(Request $request) {
        $code = $request->code;
        $quantity = $request->input('quantity');

        $product = $this->productRepository->findByCode($code);

        if (!$product) {
            return response()->json([ 'message' => 'no product found for the code ' . $code], 404);
        }
        
        $this->productRepository->addQuantity($product, $quantity);
        $this->movementRepository->insert($product, 'BUY', $quantity);
        
        return response()->json(['message' => 'Buy operation realized']);
    }
}
