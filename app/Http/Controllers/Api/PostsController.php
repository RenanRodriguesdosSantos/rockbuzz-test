<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    public function publisheds($tag = null)
    {
        return Post::published()
                ->select(['posts.*'])
                ->join('tag_post','posts.id','=','tag_post.post_id')
                ->when($tag, function ($query, $tag) {
                    return $query->where('tag_post.tag_id', $tag);
                })
                ->groupBy('posts.id')
                ->paginate(12);
    }

    public function unique($id)
    {
        $post = Post::published()->find($id);

        $post->views++;
        $post->save();

        $post->tags = $post->tags()->get(['id','name']);
        $post->author = $post->author()->first(['name']);

        return $post;
    }
}
