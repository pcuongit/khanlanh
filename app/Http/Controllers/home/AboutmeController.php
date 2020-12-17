<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutme;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
class AboutmeController extends Controller
{
    public $productRepository;
    public $cateRepository;
    public function __construct(ProductInterface $productRepository, CategoryInterface $cateRepository)
    {
        $this->productRepository = $productRepository;
        $this->cateRepository = $cateRepository;
    }
    
    public function index() {
        $aboutme = Aboutme::first();
        $randomProduct = $this->productRepository->getRamdomProduct();
        return view('home.about', compact('aboutme', 'randomProduct'));
    }
}