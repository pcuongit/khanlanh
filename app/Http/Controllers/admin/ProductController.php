<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\View;
class ProductController extends Controller
{
    public $productRepository;
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->productRepository->getAll();
        return view('admin.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $handle = $this->productRepository->delete($id);
        if($handle === true) {
            return response()->json([
                "status" => 200,
                "message" => 'delete successfully',
            ]);
        }
        return response()->json([
            "status" => 400,
            "message" => 'delete failure',
        ]);
    }

    public function ajaxCreate(productRequest $request) {
        $handle = $this->productRepository->insert($request);
        if($handle['status'] === true) {
            return response()->json([
                "status" => 200,
                "message" => $handle['messages'],
            ]);
        }
        return response()->json([
            "status" => 400,
            "message" => $handle['messages'],
        ]);
    }

    public function ajaxUpdate(productRequest $request, $id) {
        $handle = $this->productRepository->update($request, $id);
        if($handle['status'] === true) {
            return response()->json([
                "status" => 200,
                "message" => $handle['messages'],
            ]);
        }
        return response()->json([
            "status" => 400,
            "message" => $handle['messages'],
        ]);
    }

    public function ajaxRender(Request $request) {
        $list = $this->productRepository->getAll();
        return View::make('admin.categories.render', ['data' => $list]);
    }
}