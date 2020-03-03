<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::limit(10)->orderBy('created_at', 'desc')->get();

        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        $post = new Post;

        $post->user_id = Auth::user()->id;
        $post->caption = $request->caption;

        $post->save();
        
        $request->photo->storeAs('public/post_images', $post->id. '.jpg');

        return redirect('/');
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();

        return redirect('/');
    }
    
}
