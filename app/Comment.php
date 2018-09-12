<?php

namespace App;

class Comment extends Model
{
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){ // $comment->user->name to get the username
        return $this->belongsTo(User::class);
    }
}
