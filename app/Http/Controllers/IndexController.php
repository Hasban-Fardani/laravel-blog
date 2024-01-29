<?php

namespace App\Http\Controllers;

use App\Models\Post;

class IndexController extends Controller
{
    //
    public function __invoke()
    {
        $latest = Post::latest()->get()->take(3);
        $posts = Post::with(['author', 'category', 'comments'])
            ->paginate(
                perPage: 9 ,
                columns: ['id', 'title', 'body', 'image', 'category_id', 'slug']);
        return view('index', compact('latest', 'posts'));
    }
}
