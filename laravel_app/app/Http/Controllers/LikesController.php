<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Auth;

class LikesController extends Controller
{
    public function store(Request $request)
    {
        $like = new Like;

        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;

        $like->save();

        return redirect('/');
    }

    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();

        return redirect('/');
    }
}
