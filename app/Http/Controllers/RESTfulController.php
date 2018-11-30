<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostService;

class RESTfulController extends Controller
{
    protected $postServices;

    public function __construct(PostService $postService)
    {
        $this->postServices = $postService;
    }

    public function index()
    {
        $posts = $this->postServices->getAll();
        return response()->json($posts, 200);
    }

    public function show($id)
    {
        $dataPost = $this->postServices->findById($id);
        return response()->json($dataPost['posts'], $dataPost['statusCode']);
    }

    public function store(Request $request)
    {
        $dataPost = $this->postServices->create($request->all());
        return response()->json($dataPost['posts'], $dataPost['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataPost = $this->postServices->update($request->all(), $id);
        return response()->json($dataPost['posts'], $dataPost['statusCode']);
    }

    public function destroy($id)
    {
        $dataPost = $this->postServices->destroy($id);
        return response()->json($dataPost['message'], $dataPost['statusCode']);
    }
}
