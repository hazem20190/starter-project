<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        return view('themes.index');
    }
    public function category()
    {
        return view('themes.category');
    }
    public function contact()
    {
        return view('themes.contact');
    }
    public function blog()
    {
        return view('themes.blog-details');
    }
    public function login()
    {
        return view('themes.login');
    }
    public function register()
    {
        return view('themes.register');
    }
}
