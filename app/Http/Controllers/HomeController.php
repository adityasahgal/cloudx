<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function services()
    {
        return view('services');
    }
    public function addCloud()
    {
        return view('addCloud');
    }
    public function cloudtransfer()
    {
        return view('cloudtransfer');
    }
    public function uploads()
    {
        return view('upload');
    }
}
