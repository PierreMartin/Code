<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name'];

    // RELATION  Posts <-> images :
    public function post() {
        return $this->belongsTo('App\Post');
    }

}
