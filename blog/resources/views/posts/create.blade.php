@extends('layouts.master') @section('content')

<div class="col-md-8 blog-main">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Create Post
    </h3>

    <form method="POST" action="/posts">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
</div>

@endsection @section('footer') @endsection