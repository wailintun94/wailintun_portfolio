<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index () {
        return view ('posts.index', [
            'categories' => Category::whereHas('posts', function($query){ $query->published(); })->take(10)->get(),
        ]);
    }

    public function show (Post $post) { //$post should be the same name as route in web.php
        return view ('posts.show', [
            'post' => $post
        ]);
    }
}
