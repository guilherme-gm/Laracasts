<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;
use App\Repositories\Posts;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts)
    {
        // $posts = Post::latest();

        // if ($month = request('month')) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }

        // if ($year = request('year')) {
        //     $posts->whereYear('created_at', $year);
        // }

        // $posts = $posts->get();

        // $posts = Post::latest()
        //     ->filter(request(['month', 'year']))
        //     ->get();
        
        // Using repositories
        // $posts = (new \App\Repositores\Posts)->all(); // bad
        // good
        $posts = $posts->all();

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

        session()->flash('message', 'Your post has now been published.');

        return redirect('/');
        
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
