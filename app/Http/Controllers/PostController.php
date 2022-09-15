<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Get all posts
     *
     * @return Object
     */
    function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Create Posts
     */
    function create()
    {
        return view('posts.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts'  ,
            'body' => 'required',
            'image' => 'required|mimes:jpg, png, jpeg|max:1024'
        ]);

        $post = Post::create($request->all());

        if ($request->has('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('posts.index')->with('successMsg', "Successfully created");
    }
}
