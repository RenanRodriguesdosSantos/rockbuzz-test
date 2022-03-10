<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    public function listar()
    {
        return Post::paginate(12);
    }

    public function find($id)
    {
        $post = Post::find($id);
        $post->tags = $post->tags()->select('id','name')->get();

        return $post;
    }
}
