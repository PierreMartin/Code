@extends('layouts.dashboard')

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <p>{{ $post->published_at }}</p>

    @if($post->category)
        <p>categorie : <a href="#">{{ $post->category->title }}</a></p>
    @endif

    @if($post->tags)
        Tags associés :
        <ul>
            @foreach($post->tags as $tag)
                <li>{{$tag->name}}</li>
            @endforeach
        </ul>
    @endif
@endsection

@section('footer')
    <h2>Footer</h2>
@endsection



