<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Order\OrderInterface;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\View;
class OrderController extends Controller
{
    public $productRepository;
    public $cateRepository;
    public $orderRepository;
    public function __construct(ProductInterface $productRepository, CategoryInterface $cateRepository, OrderInterface $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->cateRepository = $cateRepository;
        $this->orderRepository = $orderRepository;
    }

    public function index() {
        $data = $this->orderRepository->getAll();
        return view('admin.orders.index', compact('data'));
    }
}