<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Pour compter le nombre de commentaires par postes :
        Comment::created(function($comment) {
            $comment->post->comments_count++;
            $comment->post->save();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
