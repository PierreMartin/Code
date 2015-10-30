@extends('layouts.default')


@section('content')
    <h1>Contact :</h1>

    <div class="well">
        {!! Form::open(['url' =>url('contact') ]) !!}
            <div class="form-group {{ $errors->has('email')? 'has-error' : '' }}">
                {!! Form::label('email', 'Titre de l\'article') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('message')? 'has-error' : '' }}">
                {!! Form::label('message', 'Content') !!}
                {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('category_id')? 'has-error' : '' }}">
                {!! Form::label('category_id', 'catégories associés') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
            </div>

            <button class="btn btn-primary">Envoyer</button>
        {!! Form::close() !!}
    </div>
@endsection

@section('footer')
    <h2>Footer</h2>
@endsection
