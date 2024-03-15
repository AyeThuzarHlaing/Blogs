<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogQuery = Blog::with('category', 'author')->latest(); //Blog::orderBy('title', 'desc')->get()
        if (request('search')) {
            $blogQuery->where('title', 'like', '%' . request('search') . '%');
        }
        return view('blogs.index', [
            'blogs' => $blogQuery->simplePaginate(4)->withQueryString(),
            'categories' => Category::all()
        ]);
    }
    public function show(Blog $blog) {

            return view('blogs.show', [
                'blog' => $blog
            ]);
        
    }
}
