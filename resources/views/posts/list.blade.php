@extends('layout')
@section('title', 'My Blog')
@section('content')

    <a class="navbar-brand">My Blog</a>

    <div class="col-6">
        <p>
            <a href="{{route('posts.create')}}" class="btn btn-primary">Create new post</a>
        </p>
    </div>
    <div class="col-6">
        <form class="navbar-form navbar-right" action="{{ route('posts.search') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Search"
                               value="{{ (isset($_GET['keyword'])) ? $_GET['keyword'] : '' }}">
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
    <ul>
        @if(count($posts) == 0)
            <tr>
                <td colspan="7" class="text-center">Không có dữ liệu</td>
            </tr>
        @else
            <?php foreach ($posts as $post): ?>
            <li>
                <h2><a href="{{route('posts.view', $post->id)}}">{{ $post->title }}</a></h2>
                <span>{{ $post->created }}</span>
                <p>{{ $post->teaser }}</p>
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm">Update</a>
                <a href="{{route('posts.destroy', $post->id)}}" class="btn btn-warning btn-sm"
                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>
            </li>
            <?php endforeach; ?>
        @endif
    </ul>
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="pagination float-right">
                    {{ $posts->appends(request()->query()) }}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection