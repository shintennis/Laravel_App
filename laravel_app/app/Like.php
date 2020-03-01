<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Post()
    {
        return $this->belongsTo('App\Post');
    }

    public function likedBy($user)
    {
        return Like::where('user_id', $user->id)->where('post_id', $this->id);
    }
}
