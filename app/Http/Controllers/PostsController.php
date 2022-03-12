<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts', $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'published' => $request->published ? true: false,
            'author_id' => $request->user()->id
        ]);

        if($request->tags){
            $post->tags()->attach(explode(',',$request->tags));
        }

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            if($request->file('cover')->storeAs('covers', "image_post_".$post->id. "." . $request->cover->extension())){
                $post->cover = "image_post_".$post->id. "." . $request->cover->extension();
                $post->save();
            }
        }

        return redirect('posts');
    }

    public function unique(Post $post)
    {
        return view('posts.edit', compact('post', $post));
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'published' => $request->published ? true: false
        ]);

        if($request->tags){
            $post->tags()->sync(explode(',',$request->tags));
        }

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            if($request->file('cover')->storeAs('covers', "image_post_".$post->id. "." . $request->cover->extension())){
                $post->cover = "image_post_".$post->id. "." . $request->cover->extension();
                $post->save();
            }
        }

        return redirect('posts');
    }

    public function destroy($id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->forceDelete();

        return redirect('posts/trash');
    }

    public function moveToTrash(Post $post)
    {
        $post->delete();

        return redirect('posts/trash');
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->restore();

        return redirect('posts');
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();

        return view('posts.trash', compact('posts', $posts));
    }

}
