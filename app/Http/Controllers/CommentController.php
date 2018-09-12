<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post){
        /*Comment::create([
           'body' => request('body'),
            'post_id' => $post->id,
        ]);*/

        //$post->comments()->create(['body'=>request('body')]);
        $this->validate(\request(), ['body' => 'required|min:2']);
        /*$post->addComment(request('body'));*/

        Comment::create([
            'body' => \request('body'),
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
