<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(2);
        return view('themes.index', compact('blogs'));
    }
    public function category($name)
    {
        // $blogs = blog::where('category_id', '=', $id)->paginate(8);
        $category_id = Category::where('name', '=', $name)->first()->id;
        $blogs = blog::where('category_id', '=', $category_id)->paginate(8);
        return view('themes.category', compact('blogs', 'name'));
    }
    public function contact()
    {
        return view('themes.contact');
    }
    // public function blog()
    // {
    //     return view('themes.blog-details');
    // }
    public function login()
    {
        return view('themes.login');
    }
    public function register()
    {
        return view('themes.register');
    }
}
