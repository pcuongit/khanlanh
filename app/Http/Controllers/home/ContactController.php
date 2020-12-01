<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index() {
        $contact = Contact::first();
        return view('home.contact', compact('contact'));
    }
}