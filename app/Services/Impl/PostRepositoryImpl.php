<?php
namespace App\Http\Services\Impl;

use App\Http\Repositories\PostRepository;
use App\Http\Services\PostService;

class PostServiceImpl implements PostService
{
    protected $postRepository;


    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        $post = $this->postRepository->getAll();

        return $post;
    }

    public function findById($id)
    {
        $post = $this->postRepository->findById($id);

        $statusCode = 200;
        if (!$post)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'posts' => $post
        ];

        return $data;
    }

    public function create($request)
    {
        $post = $this->postRepository->create($request);

        $statusCode = 201;
        if (!$post)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'posts' => $post
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldPost = $this->postRepository->findById($id);

        if (!$oldPost) {
            $newCustomer = null;
            $statusCode = 404;
        } else {
            $newCustomer = $this->postRepository->update($request, $oldPost);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'posts' => $newCustomer
        ];
        return $data;
    }

    public function destroy($id)
    {
        $post = $this->postRepository->findById($id);

        $statusCode = 404;
        $message = "Post not found";
        if ($post) {
            $this->postRepository->destroy($post);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}