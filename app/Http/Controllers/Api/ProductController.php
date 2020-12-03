<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Http\Response;
class ProductController extends Controller
{
    public $productRepository;
    public $cateRepository;
    public function __construct(ProductInterface $productRepository, CategoryInterface $cateRepository) {
        $this->productRepository = $productRepository;
        $this->cateRepository = $cateRepository;
    }

    public function getAll(Request $request) {
        $list = $this->productRepository->getAll();
        return response()->json([
            'data' => $list,
            'token_refresh' => $request->get('token_refresh')
        ], Response::HTTP_OK);
    }
}