<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\Adminstrator;

class ApiTokenController extends Controller
{
    public function login(Request $request) {
        $model = new Adminstrator();
        $x_access_token = $request->headers->get('x_access_token');
        if(!$x_access_token) return response()->json(['status' => 403, 'message' => 'Authorized Failed'], Response::HTTP_FORBIDDEN);
        else {
            $decode = base64_decode($x_access_token);
            $split = explode('/', $decode);
            $user = $model->where(['username' => $split[0]])->first();
            if(Hash::check($split[1], $user->password)) {
                return response()->json(['status' => 200, 'api_token' => $user->api_token], Response::HTTP_OK);
        
            return response()->json(['status' => 403, 'message' => 'Authorized Failed'], Response::HTTP_FORBIDDEN);
            }
        }
    }
    public function update(Request $request)
    {
        $token = Str::random(60);
        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return response()->json(['token' => $token, 'status' => 200], Response::HTTP_OK);
    }
}