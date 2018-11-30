<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use http\Env\Response;


class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::orderByRaw('title ASC')->paginate(3);
        return view('posts.list', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function view($id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.view', compact('posts'));
    }

    public function store(Request $request)
    {
        $posts = new Post();
        $posts->title = $request->input('title');
        $posts->teaser = $request->input('teaser');
        $posts->content = $request->input('content');
        $posts->created = $request->input('created');
        $posts->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('posts.index');
    }

    public function update(Request $request, $id)
    {
        $posts = Post::findOrFail($id);
        $posts->title = $request->input('title');
        $posts->teaser = $request->input('teaser');
        $posts->content = $request->input('content');
        $posts->created = $request->input('created');
        $posts->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.edit', compact('posts'));
    }

    public function destroy($id)
    {
        $posts = Post::findOrFail($id);

        $posts->delete();

        return redirect()->route('posts.index');
    }

    public function search(Request $request)

    {

        $keyword = $request->input('keyword');

        if (!$keyword) {

            return redirect()->route('posts.index');

        }

        $posts = Post::where('title', 'LIKE', '%' . $keyword . '%')

            ->paginate(3);

        return view('posts.list', compact('posts'));

    }

    public function showBlog(Request $request)
    {
        // Kiểm tra Session login có tồn tại hay không
        if ($request->session()->has('login') && $request->session()->get('login')) {

            // Session login tồn tại và có giá trị là true, chuyển hướng người dùng đến trang blog
            return route('posts.index');
        }

        // Session không tồn tại, người dùng chưa đăng nhập
        // Gán một thông báo vào Session not-login
        $message = 'Bạn chưa đăng nhập.';
        $request->session()->flash('not-login', $message);

        // Chuyển hướng về trang đăng nhập
        return view('login');
    }

}
