@extends('layouts.dashboard')

@section('content')
    <h1>Login</h1>

    <div class="well">
        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}

            <div class="form-group">
                Email
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div class="form-group">
                Password
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Login</button>

        </form>

    </div>
@endsection

@section('footer')
    <h2>Footer</h2>
@endsection



