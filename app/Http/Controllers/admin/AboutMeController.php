<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutme;
class AboutMeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $description = Aboutme::first();
        return view('admin.aboutme', compact('description'));
    }
    public function createOrUpdate(Request $request)
    {
        $idAboume = $request->get('id_aboutme');
        $result;
        if ($idAboume === 'null') {
            $result = Aboutme::create(['description' => $request->get('description')]);
        } else { 
            $result = Aboutme::where('id', $idAboume)->update(['description' => $request->get('description')]);
        }
        if ($result) return response()->json([
            'status' => 200,
            'messages' => 'cập nhật thành công'
        ]);
        return response()->json([
            'status' => 400,
            'messages' => 'cập nhật thất bại'
        ]);
    }
}