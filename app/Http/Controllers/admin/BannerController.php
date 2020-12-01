<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Banner\BannerInterface;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\View;
class BannerController extends Controller
{
    public $bannerRepository;
    public function __construct(BannerInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    public function index() {
        $data = $this->bannerRepository->getAll();
        return view('admin.banners.index', compact('data'));
    }
    public function ajaxCreate(BannerRequest $request) {
        $handle = $this->bannerRepository->insert($request);
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
    public function ajaxUpdate(BannerRequest $request, $id) {
        $handle = $this->bannerRepository->update($request, $id);
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

    public function destroy($id)
    {
        $handle = $this->bannerRepository->delete($id);
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

    public function ajaxRender(Request $request) {
        $list = $this->bannerRepository->getAll();
        return View::make('admin.banners.list', ['data' => $list]);
    }

    public function ajaxRenderEdit($id) {
        $banner = $this->bannerRepository->findBanner($id);
        return View::make('admin.banners.form_edit', ['banner' => $banner]);
    }
}