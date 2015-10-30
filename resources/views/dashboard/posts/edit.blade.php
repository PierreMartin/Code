@extends('layouts.dashboard')


@section('content')
    <h1>Editer</h1>

    <div class="well">
        {!! Form::open(['method' => 'put', 'url' => route('admin.posts.update', $post), 'files' => true ]) !!}

            <div class="form-group {{ $errors->has('title')? 'has-error' : '' }}">
                {!! Form::label('title', 'Titre de l\'article') !!}
                {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('slug')? 'has-error' : '' }}">
                {!! Form::label('slug', 'URL') !!}
                {!! Form::text('slug', $post->slug, ['class' => 'form-control']) !!}
                {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('image')? 'has-error' : '' }}">
                {!! Form::label('image', 'Image :') !!}
                {!! Form::file('image', ['class' => 'form-control']) !!}
                {!! $errors->first('image', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('content')? 'has-error' : '' }}">
                {!! Form::label('content', 'Content') !!}
                {!! Form::textarea('content', $post->content, ['class' => 'form-control']) !!}
                {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('category_id')? 'has-error' : '' }}">
                {!! Form::label('category_id', 'catégories associés') !!}
                {!! Form::select('category_id', $categories, $post->category_id, ['class' => 'form-control']) !!}
                {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('tags')? 'has-error' : '' }}">
                {!! Form::label('tags[]', 'tags associés') !!}
                {!! Form::select('tags[]', App\Tag::lists('name', 'id'), $post->tags->lists('id')->all(), ['class' => 'form-control', 'multiple' => true]) !!}
                {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('status', '1', $post->status) !!} Mettre en ligne
                    </label>
                </div>
            </div>

            <button class="btn btn-primary">Envoyer</button>

        {!! Form::close() !!}
    </div>
@endsection

@section('footer')
    <h2>Footer</h2>
@endsection



