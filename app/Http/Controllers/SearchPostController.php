<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Http\Request;

class SearchPostController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        $tags = PostTag::all();
        $posts = Post::search($request)->get();
        return view('search', compact('posts', 'categories', 'tags'));
    }
}
