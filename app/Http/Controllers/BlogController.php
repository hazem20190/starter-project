<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_blogs = blog::where('user_id', '=', Auth::user()->id)->paginate(10);
        return view('themes.my-blogs', compact('my_blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (Auth::check()) {
        // }

        $categories = Category::get();
        return view('themes.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $imageName = time() . '_' . $request->image->getclientoriginalname();
        $request->image->storeAs('blogs', $imageName, 'public');
        $data['image'] = $imageName;
        $data['user_id'] = Auth::user()->id;
        // dd($data);
        Blog::create($data);
        return back()->with('status.blog', 'The Blog Added Successuflly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {

        return view('themes.blog-details', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            $categories = Category::get();
            return view('themes.blogs.edit', compact('blog', 'categories'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {

            $data = $request->validated();
            if ($request->hasFile('image') && $request->file('image')->isvalid()) {
                storage::disk('public')->delete("blogs/$blog->image");
                $newImageName = time() . '_' . $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('blogs', $newImageName, 'public');
                $data['image'] = $newImageName;
            }
            $blog->update($data);
            return back()->with('StatusUpdateBlog', 'The Blog Has Been Update Successfully');
        }
        abort('404');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            Storage::disk('public')->delete("blogs/$blog->image");
            $blog->delete();
            return back()->with('StatusBlogDelete', 'The Blog Has Been Deleted Successfully');
        }
        abort(404);
    }
}
