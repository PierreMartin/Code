<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Comment;
use App\Category;
use App\Image;

use App\Http\Requests\ContactFormRequest;
use Mail;

class PostController extends Controller
{

    //////////////////////////////// HOME ////////////////////////////////
    public function home()
    {
        return view('welcome');
    }

    //////////////////////////////// POSTS ////////////////////////////////
    public function index()
    {
        //$posts = Post::with('category', 'tags', 'image')->paginate(10);
        $posts = Post::where('status', true)->orderBy('published_at', 'desc')->with('category', 'tags', 'image')->paginate(10);

        return view('front.posts.index', compact('posts'));
    }

    public function show($slug='')
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('front.posts.show', compact('post') );
    }

    //////////////////////////////// GESTION DES MAILS ////////////////////////////////
    public function showContact()
    {
        $categories = Category::lists('title', 'id');
        return view('front.contact', compact('categories'));
    }

    public function sendContact(ContactFormRequest $request)
    {
        // $message        = $request->all()['message'];
        // $email          = $request->all()['email'];
        // $category_id    = $request->all()['category_id'];

        // $contents = [
        //     'message'       => $request->input('message'),
        //     'email'         => $request->input('email'),
        //     'category_id'   => $request->input('category_id')
        // ];

        $contents = $request->all();

        Mail::send('emails.email', compact('contents'), function($message) use ($request) {
            $message->from('hicode@hicode.fr', 'Laravel');
            $message->to('pierremartin.pro@gmail.com')->cc('bar@exemple.com');
        });
    }

    //////////////////////////////// SHOW CATEGORIES BY POSTS ////////////////////////////////
    public function showPostByCategory($id)
    {
        $posts = Category::find($id)->posts;
        //$posts = Post::with('category', 'tags')->paginate(10);

        return view('front.categories.index', compact('posts'));
    }

}
