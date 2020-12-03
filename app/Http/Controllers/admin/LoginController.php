<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminstratorRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if(Auth::check()) return redirect('/adminstrator');
        return view('admin.login');
    }
    public function login(AdminstratorRequest $request) {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/adminstrator');
        } else {
            return redirect()->back()->withInput()->withErrors(['username' => 'sai tài khoản hoặc mật khẩu, vui lòng thử lại']);
        }
    }

    public function logout() {  
        Auth::logout();
        return redirect()->intended('/adminstrator/login');
    }
}