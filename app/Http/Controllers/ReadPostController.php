<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Visitor;
use Illuminate\Http\Request;

class ReadPostController extends Controller
{
    //
    public function __invoke(Request $request, Post $post)
    {
        Visitor::create([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->url(),
        ]);

        $post = Post::with(['author', 'category', 'comments'])->where('slug', $post->slug)->first();
        return view('read', compact('post'));
    }
}
