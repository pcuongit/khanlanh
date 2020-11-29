<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $productRepository;
    public $categoryRepository;
    public function __construct(ProductInterface $productRepository, CategoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        $listCate = $this->categoryRepository->getAll();
        $firstCate = $this->categoryRepository->getFirst();
        return view('home.index', compact('listCate', 'firstCate'));
    }

    public function ajaxGetProducts(Request $request) {
        // dd($request->all());
        $slug = $request->get('slug');
        $products = $this->productRepository->getProductsByCategory($slug);
        return View::make('home.renders.product', ['list' => $products]);
    }
}