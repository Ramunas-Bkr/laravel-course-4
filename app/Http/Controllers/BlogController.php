<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        $categories = Category::orderBy('title')->get();
        return view('pages.index', [
            'posts' => $posts,
            'categories' => $categories,
            'title' => 'My blog'
        ]);
    }

    public function getPostsByCategory($slug)
    {
        $categories = Category::orderBy('title')->get();
        $currentCategory = Category::where('slug', $slug)->first();
        return view('pages.index', [
            'posts' => $currentCategory->posts()->paginate(2),
            'categories' => $categories,
            'title' => $currentCategory->title
        ]);
    }

    public function getPost($slug_category, $slug_post)
    {
        $post = Post::where('slug', $slug_post)->first();
        $categories = Category::orderBy('title')->get();

        return view('pages.show-post', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }
}
