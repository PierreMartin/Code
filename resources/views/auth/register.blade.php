@extends('layouts.default')

@section('content')
    <div class="well">
        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}

            <div class="form-group">
                Name
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>

            <div class="form-group">
                Email
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div class="form-group">
                Password
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                Confirm Password
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div>
                <button class="btn btn-primary" type="submit">S'enregister !</button>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    <h2>Footer</h2>
@endsection
