<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('index')
            ->with(['posts' => $posts]);
    }

    public function create(PostRequest $request)
    {
        $post = new Post();
        $post->content = $request->content;
        $post->save();

        return redirect()
            ->route('posts.index');
    }

    public function update(PostRequest $request)
    {
        Post::find($request->id)->update(['content'=>$request->content]);

        return redirect()
            ->route('posts.index');
    }

    public function destroy(Request $request)
    {
        Post::find($request->id)->delete(['content'=>$request->content]);

        return redirect()
            ->route('posts.index');
    }
}
