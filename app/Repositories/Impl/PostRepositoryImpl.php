<?php
namespace App\Http\Repositories\Impl;

use App\Post;
use App\Http\Repositories\PostRepository;
use App\Http\Repositories\Eloquent\EloquentRepository;

class PostRepositoryImpl extends EloquentRepository  implements PostRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Post::class;
        return $model;
    }
}