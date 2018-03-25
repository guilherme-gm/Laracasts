<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        // $post = new Post();
        
        // $post->title = request('title');
        // $post->body = request('body');

        // $post->save();

        // Mass assign
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body')
        // ]);

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        return redirect('/');
        
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
