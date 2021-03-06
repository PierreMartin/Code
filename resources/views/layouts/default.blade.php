<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>

        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">CØDE</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('posts') }}">Les postes</a></li>
                        @include('partials.menu_categories')
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/auth/login') }}">Se connecter</a></li>
                        <li><a href="{{ url('/auth/register') }}">S'inscire</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            @if(Session::has('message'))
                <blockquote>
                    <div class="alert alert-dismissible alert-success">{{ Session::get('message') }}</div>
                </blockquote>
            @endif

            <div class="row">
                <div class="col-sm-9">
                    @yield('content')
                </div>

                <div class="col-sm-3">
                    @include('partials.aside1')
                </div>
            </div>
        </div>


        <footer style="background-color: #bda77d; ">
            @section('footer')
                <h3>Footer ici</h3>
            @show
        </footer>

    </body>
</html>