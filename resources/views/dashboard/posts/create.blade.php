@extends('layouts.dashboard')


@section('content')
    <h1>Creer un nouvel article</h1>

    <div class="well">
        {!! Form::open(['url' => route('admin.posts.store'), 'method' => 'POST', 'files' => true ]) !!}

            <div class="form-group {{ $errors->has('title')? 'has-error' : '' }}">
                {!! Form::label('title', 'Titre de l\'article') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('slug')? 'has-error' : '' }}">
                {!! Form::label('slug', 'URL :') !!}
                {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('image')? 'has-error' : '' }}">
                {!! Form::label('image', 'Image :') !!}
                {!! Form::file('image', ['class' => 'form-control']) !!}
                {!! $errors->first('image', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('content')? 'has-error' : '' }}">
                {!! Form::label('content', 'Content') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group">
                {!! Form::label('published', 'Date de publication') !!}
                {!! Form::published() !!}
            </div>

            <div class="form-group {{ $errors->has('category_id')? 'has-error' : '' }}">
                {!! Form::label('category_id', 'catégories associés') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('tags')? 'has-error' : '' }}">
                {!! Form::label('tags[]', 'tags associés') !!}
                {!! Form::select('tags[]', App\Tag::lists('name', 'id'), null, ['class' => 'form-control', 'multiple' => true]) !!}
                {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
            </div>


            <div class="form-group">
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('status', '1', null) !!} Mettre en ligne
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



