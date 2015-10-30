<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'published_at', 'status', 'category_id', 'comments_count', 'image_id'];
    protected $casts    = ['status' => 'boolean'];

    // App\Post::create(['title' => 'Titre 2', 'slug' => 'bazsszaza', 'excerpt' => 'jhsjsshcjshj', 'content' => 'jhsjhhjjh jh jh jh jhcjshj']);
    // App\Post::create(['title' => 'Titre 1']);


    // RELATION  Posts <-> comments :
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    // RELATION  Posts <-> Category  :
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // RELATION  Posts <-> Tags  :
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    // RELATION  Posts <-> user  :
    public function user() {
        return $this->belongsTo('App\User');
    }

    // RELATION  Posts <-> image :
    public function image() {
        return $this->belongsTo('App\Image');
    }

    // si slug non remplis :
    public function setSlugAttribute($value)
    {
        $value = trim($value);
        if ( empty($value) ) {
            $this->attributes['slug'] = Str::slug($this->title);
        } else {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

}
