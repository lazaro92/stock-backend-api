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
            return response()->json(['message' => 'no product found for the code ' . $code], 404);
        }

        $product->quantity += $quantity;
        
        $this->productRepository->insert($product);
        $this->movementRepository->insert($product, 'BUY', $quantity);
        
        return response()->json(['message' => 'Buy operation realized']);
    }

    public function sellProduct(Request $request) {
        $code     = $request->code;
        $quantity = $request->input('quantity');
        $money    = $request->input('money');

        $product = $this->productRepository->findByCode($code);

        if (!$product) {
            return response()->json(['message' => 'no product found for the code ' . $code], 404);
        }
        
        if ($money < $product->price) {
            return response()->json(['message' => 'Operation failed: not enought money to sell the product'], 400);
        }

        if ($quantity > $product->quantity) {
            return response()->json([
                    'message' => 'Operation failed: not enought stock for this product.',
                    'currentStock' => $product->quantity
                ], 400);
        }

        $product->quantity -= $quantity;

        $this->productRepository->insert($product);
        $this->movementRepository->insert($product, 'SELL', $quantity);
    }
}
