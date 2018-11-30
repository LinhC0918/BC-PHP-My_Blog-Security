@extends('layout')
@section('title', 'My Blog')
@section('content')

    <a class="navbar-brand">My Blog</a>
    <p>
        <a href="{{route('posts.index')}}" class="btn btn-default">Return to posts</a>
    </p>

    <h1>{{ $posts->title }}</h1>
    Created: <p>{{ $posts->created }}</p>
    Teaser: <p>{{ $posts->teaser }}</p>
    Content: <p>{{ $posts->content }}</p>

@endsection