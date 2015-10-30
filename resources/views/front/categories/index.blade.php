@extends('layouts.default')

@section('content')
    @forelse($posts as $post)
        <h2><a href="{{ url('post', $post->slug) }}">{{ $post->title }}</a></h2>
         <p>{{ $post->excerpt }}</p>
         @if($post->image)
            <a href="{{ url('post', $post->slug) }}"><img src="{{ url(asset('uploads/'.$post->image->name)) }}" alt="image_laravel"/></a>
         @endif
         <p>{{ $post->published_at }}</p>

         @if($post->category)
             <p>categorie : <a href="{{ url('categorie', $post->category->id) }}">{{ $post->category->title }}</a></p>
         @endif

         @if($post->tags)
             Tags associés :
             <ul>
                 @foreach($post->tags as $tag)
                     <li>{{$tag->name}}</li>
                 @endforeach
             </ul>
             <span>nombre de commentaires : {{ $post->comments_count }}</span>
         @endif

         <hr>
     @empty
         <p>Pas de postes pour cette catégorie</p>
     @endforelse
@endsection

@section('footer')
    <h2>Footer</h2>
@endsection



