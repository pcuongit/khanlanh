<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index()
    {
        $description = Contact::first();
        return view('admin.contact', compact('description'));
    }
    public function createOrUpdate(Request $request)
    {
        $idContact = $request->get('id_contact');
        $result;
        if ($idContact === 'null') {
            $result = Contact::create(['description' => $request->get('description')]);
        } else { 
            $result = Contact::where('id', $idContact)->update(['description' => $request->get('description')]);
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