<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;

class ProductController extends Controller
{
    public $productRepository;
    public $cateRepository;
    public function __construct(ProductInterface $productRepository, CategoryInterface $cateRepository)
    {
        $this->productRepository = $productRepository;
        $this->cateRepository = $cateRepository;
    }
    public function index($slug) {
        $listCate = $this->cateRepository->getAll();
        foreach ($listCate as $item) {
            $item->count = $this->productRepository->countAllBySlug($item->slug);
        }
        $category = $this->cateRepository->getBySlug($slug);
        if(!$category) abort(404);
        $products = $this->productRepository->getProductsByCategory($slug, 0);
        
        return view('home.category', compact('products', 'category', 'listCate'));
    }

    public function detailProduct($slug_cate, $slug_product) {
        $category = $this->cateRepository->getBySlug($slug_cate);
        if(!$category) abort(404);

        $product = $this->productRepository->getProductsBySlug($slug_cate, $slug_product);
        if(!$product) abort(404);

        return view('home.detail_product', compact('category', 'product'));
    }

    public function ajaxFindProduct(Request $request) {
        $slug_cate = $request->input('slug_cate');
        $search_text = $request->input('search_text');
        $category = $this->cateRepository->getBySlug($slug_cate);
        if(!$category) return response()->json([
            'status' => 404,
            'message' => "not found"
        ]);
        $product = $this->productRepository->searchProductsBySlug($slug_cate, $search_text);
        if(!$product) return response()->json([
            'status' => 404,
            'message' => "not found"
        ]);

        return response()->json([
            'status' => 200,
            'data' => $product->toArray()
        ]);
    }
}