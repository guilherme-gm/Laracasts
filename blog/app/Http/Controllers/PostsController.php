<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
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

        Post::create(request(['title', 'body']));

        return redirect('/');
        
    }

    public function show(Post $post1)
    {
        return view('posts.show');
    }
}
