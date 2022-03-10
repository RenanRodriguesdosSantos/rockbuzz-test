<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    public function listar()
    {
        return Post::where('publicado',true)->paginate(12);
    }

    public function find($id)
    {
        $post = Post::find($id);
        $post->visualizacoes++;
        $post->save();

        $post->tags = $post->tags()->select('id','name')->get();
        $post->autor = $post->autor()->first()? $post->autor()->first()->name : '';

        return $post;
    }
}
