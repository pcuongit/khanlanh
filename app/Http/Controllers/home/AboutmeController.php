<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutme;
class AboutmeController extends Controller
{
    public function index() {
        $aboutme = Aboutme::first();
        return view('home.about', compact('aboutme'));
    }
}