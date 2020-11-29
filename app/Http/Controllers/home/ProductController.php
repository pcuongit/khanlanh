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
        $category = $this->cateRepository->getBySlug($slug);
        if(!$category) abort(404);
        $products = $this->productRepository->getProductsByCategory($slug);
        
        return view('home.category', compact('products', 'category'));
    }
}