<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Support\Facades\View;
use App\Repositories\Banner\BannerInterface;


class HomeController extends Controller
{
    public $productRepository;
    public $categoryRepository;
    public $bannerRepository;
    public function __construct(ProductInterface $productRepository, CategoryInterface $categoryRepository,BannerInterface $bannerRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->bannerRepository = $bannerRepository;
    }

    public function index() {
        $listCate = $this->categoryRepository->getAll();
        foreach($listCate as $item) {
            $item->products = $this->productRepository->getProductsByCategory_1($item->slug, 4);
        }
        $banners = $this->bannerRepository->getAll();
        return view('home.index', compact('listCate', 'banners'));
    }

    public function ajaxGetProducts(Request $request) {
        // dd($request->all());
        $slug = $request->get('slug');
        $page = $request->get('page');
        $count = $this->productRepository->countAllBySlug($slug);
        $limit = \Config::get('constant.limit_product');
        $products = $this->productRepository->getProductsByCategory($slug, $page);
        return View::make('home.renders.product', ['list' => $products, 'totalProducts' => $count, 'limit' => $limit]);
    }
}