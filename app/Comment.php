<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['email', 'message', 'spam', 'post_id'];

    public function post() {
        return $this->belongsTo('App\Post');
    }

}
