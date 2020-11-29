<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $categoryRepository;
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        $listCate = $this->categoryRepository->getAll();
        // dd($listCate);
        return view('home.index', compact('listCate'));
    }
}