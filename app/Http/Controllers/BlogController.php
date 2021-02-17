<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\Category;

class BlogController extends Controller
{
    public function index() {
        $posts = Post::paginate(5);
        $categories = Category::orderBy('title')->get();
        return view('pages.index', [
            'posts' => $posts,
            'categories' => $categories    
        ]);
    }

    public function getPostsByCategory($slug) {
        $categories = Category::orderBy('title')->get();
        $currentCategory = Category::where('slug', $slug)->first();
        return view('pages.index', [
            'posts' => $currentCategory->posts,
            'categories' => $categories
        ]);
    }
}
