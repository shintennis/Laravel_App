<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class UsersController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function show($user_id)
    {
        $user = User::where('id', $user_id)->firstOrFail();

        return view('user/show', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user/edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->user_password);

        $user->save();

        redirect('/');
    }
}
