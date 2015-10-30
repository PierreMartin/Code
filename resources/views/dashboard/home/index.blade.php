@extends('layouts.dashboard')


@section('content')
    <h1>Bienvenu {{ $username }} dans le back office</h1>
    <em>Vous êtes maintenanat connecté. votre compte : {{ $email }}</em>
    <br><br>


    <h4>Mes postes créers :</h4>
    @forelse(Auth::user()->posts as $post)
        <h3><a href="{{ url('post', $post->slug) }}">{{ $post->title }}</a></h3>
        @if($post->image)
           <a href="{{ url('post', $post->slug) }}"><img src="{{ url(asset('uploads/'.$post->image->name)) }}" alt="image_laravel"/></a>
        @endif
        <p>{{ $post->excerpt }}...</p>
        <p>date de publication : {{ $post->published_at }}</p>
        <hr>
    @empty
        <i>aucun pour le moment</i>
    @endforelse
    <br><br>

    <h4>Actions d'administration :</h4>
    <ul>
        <li><a href="{{ url('admin/posts') }}">Administer les articles</a></li>
        <li><a href="{{ url('admin/posts/create') }}">creer un nouveau poste</a></li>
    </ul>
@endsection

@section('footer')
    <h2>Footer</h2>
@endsection



