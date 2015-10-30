@extends('layouts.default')

@section('content')
    <h1>{{ $post->title }}</h1>
    @if($post->image)
       <a href="{{ url('post', $post->slug) }}"><img src="{{ url(asset('uploads/'.$post->image->name)) }}" alt="image_laravel"/></a>
    @endif
    <p>{{ $post->content }}</p>
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
    @endif

    {{-- //////////// affichage des commentaire associer a 1 poste : //////////// --}}
        <h3>Commentaires :<span> {{ $post->comments_count }} (ceux créer via seeder ne compte pas)</span></h3>
        @forelse ($post->comments as $comment)
            <ul>
                <li class="list-group-item">
                    <div class="">
                        <p>{{ $comment->email }}</p>
                    </div>
                    <div class="">
                        {{ $comment->message }}
                    </div>
                </li>
                <hr>
            </ul>
        @empty
            <p>pas de commentaires</p>
        @endforelse


        <div class="well">
            {!! Form::open(['route'=>'comment.store', 'files' => true]) !!}
                <div class="form-group {{ $errors->has('email')? 'has-error' : '' }}">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}

                    {!! Form::hidden('post_id', $post->id) !!}
                </div>

                <div class="form-group {{ $errors->has('message')? 'has-error' : '' }}">
                    {!! Form::label('message', 'votre message :') !!}
                    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
                </div>


                <button class="btn btn-primary">Envoyer</button>
            {!! Form::close() !!}

        </div>
@endsection

@section('footer')
    <h2>Footer</h2>
@endsection
