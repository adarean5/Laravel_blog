<?php

namespace App\Providers;

use App\Post;
use App\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar', function($view){
            /*
            $view->with('archives', Post::archives());
            $view->with('tags', Tag::has('posts')->pluck('name'));
            */
            $archives = Post::archives();
            $tags = Tag::has('posts')->pluck('name');

            $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        \App::bind('App\Billing\Stripe', function (){
            return new \App\Billing\Stripe(config('services.stripe.secret'));
        });
        */
        $this->app->bind('App\Billing\Stripe', function (){
            return new Stripe(config('services.stripe.secret'));
        });

    }
}
