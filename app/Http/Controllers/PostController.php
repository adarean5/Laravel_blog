<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /*public function indexOld(){
        return view('postsOld.index');
    }

    public function show(Post $post){
        return view('postsOld.show', compact('post'));
    }

    public function showall(){
        $posts = Post::all();
        return view('postsOld.showall', compact('posts'));
    }*/

    public function index(Posts $posts){
        //filter calls function scopeFilter in Post.php
        $posts = $posts->all();
        /*$posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();
        */

        //$archives = Post::archives();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        //Validation
        $this->validate(\request(), [
           'title' => 'required',
            'body' => 'required',
        ]);


        //dd(request()->all());
        //dd(request('title'));
        //dd(request(['title', 'body']));

        /*
        //Create a new post using the request data
        $post = new Post;

        $post->title = request('title');
        $post->body = \request('body');

        //Save it to the database
        $post->save();
        */

        //Or just do this:
        //For this to work >> protected  $fillable = ['title', 'body']; << must be added to to the Post model
        /*Post::create([
           'title' => request('title'),
            'body' => \request('body'),
        ]);*/
        //Shorter way
        /*Post::create([
            'title' => \request('title'),
            'body' => \request('body'),
            'user_id' => auth()->id(),
        ]);*/

        //Even shorter, uses a function we decalre in User.php model
        auth()->user()->publish(
          new Post(\request(['title', 'body']))
        );

        session()->flash('message', 'Your post has now been published');

        //Redirect to home page
        return redirect('/');
    }
}
