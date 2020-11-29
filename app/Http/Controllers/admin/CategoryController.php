<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryInterface;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public $categoryRepository;
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->categoryRepository->getAll();
        return view('admin.categories.index', compact('data'));
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
        $handle = $this->categoryRepository->delete($id);
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

    public function ajaxCreate(CategoryRequest $request) {
        $handle = $this->categoryRepository->insert($request);
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

    public function ajaxUpdate(CategoryRequest $request, $id) {
        $handle = $this->categoryRepository->update($request, $id);
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
        $list = $this->categoryRepository->getAll();
        return View::make('admin.categories.render', ['data' => $list]);
    }
}