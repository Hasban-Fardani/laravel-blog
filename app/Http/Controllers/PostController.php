<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct()
    {
        Gate::allows('create-posts');
    }

    public function index()
    {
        $posts = Post::with(['author', 'category', 'comments', 'tags'])->paginate(7);
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated()->except(['tags']);
        Post::create($data);
        
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function edit()
    {
        
    }

    public function update(UpdatePostRequest $request)
    {
        
    }

    public function destroy(Post $post)
    {
        
    }
}
