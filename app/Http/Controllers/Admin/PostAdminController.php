<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PostFormRequest; // add
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;
use App\User;
use App\Image;

use Form;
use \Carbon\Carbon;

use Input;
use Session;
use Validator;

class PostAdminController extends Controller
{

    public function __construct() {
        $this->middleware('auth');

        // INPUT DATE :
        Form::macro('published', function() {
            return '<input class="form-control" type="date" name="published_at" value="' . Carbon::now()->toDateString() . '">';
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::check()); // on verifier si un user est bien connecté
        // Auth::check();

        $posts = Post::with('category', 'tags')->paginate(10);

        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // on recupere la liste des catégorie :
        $categories = Category::lists('title', 'id');

        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostFormRequest $request)
    {
        $post = Post::create($request->all());

        // gestion du checkbox boolean 'en ligne?' :
        $post->status = (empty($request->input('status')))? 0 : 1;

        // on récupere l'id de l'utilisateur connecté :
        $userId = Auth::id();
        $post->user_id = $userId;

        $post->save();

        // envoi des tags a la bdd :
        $post->tags()->sync($request->get('tags'));

        // FILES :
        $file   = array('image' => Input::file('image'));
        $rules  = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000

        //if ( !empty($_POST['image']) ) {
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads';
                $extension = Input::file('image')->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                Input::file('image')->move($destinationPath, $fileName);

                // on insere un champ 'name' dans la bdd 'images' :
                $image = Image::create($request->all());
                $image->name = $fileName;
                $image->save();

                // on insere un champ 'id' dans la bdd 'posts' :
                $image_id = $image->id;
                $post->image_id = $image_id;
                $post->save();
            } else {
                return redirect(route('admin.posts.edit', $post))->with('message', 'Erreur : l\'image n\'est pas bonne');
                die();
            }
        //}

        return redirect(route('admin.posts.edit', $post))->with('message', 'Le poste à bien été créer ! Vous pouvez maitenant éditer votre poste');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        return view('dashboard.posts.show', compact('post') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // on recupere la liste des catégorie :
        $categories = Category::lists('title', 'id');

        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostFormRequest $request, $id)
    {
        // dd($request->all());
        $post = Post::findOrFail($id);

        $post->update($request->all());


        // gestion du checkbox boolean 'en ligne?' :
        $post->status = (empty($request->input('status')))? 0 : 1;
        $post->save();

        // envoi des tags a la bdd :
        $post->tags()->sync($request->get('tags'));

        // FILES :
        $file   = array('image' => Input::file('image'));
        $rules  = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000

        //if ( !empty($_POST['image']) ) {
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads';
                $extension = Input::file('image')->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                Input::file('image')->move($destinationPath, $fileName);

                // on insere un champ 'name' dans la bdd 'images' :
                $image = Image::create($request->all());
                $image->name = $fileName;
                $image->save();

                // on insere un champ 'id' dans la bdd 'posts' :
                $image_id = $image->id;
                $post->image_id = $image_id;
                $post->save();
            } else {
                return redirect(route('admin.posts.edit', $post))->with('message', 'Erreur : l\'image n\'est pas bonne');
                die();
            }
        //}

        return redirect(route('admin.posts.edit', $id))->with('message', 'Le poste à bien été modifier !');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->to('admin/posts/')->with('message', 'poste suprimé !');
    }
}
