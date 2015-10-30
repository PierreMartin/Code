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
                        <li><a href="{{ url('admin/posts') }}">Modifier les postes</a></li>
                        <li><a href="{{ url('admin/posts/create') }}">Creer un poste</a></li>
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/admin') }}">Home dashboard {{-- $username->name --}}</a></li>
                        <li><a href="{{ url('/auth/logout') }}">Se déconnecter</a></li>
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
                <div class="col-sm-12">
                    @yield('content')
                </div>
            </div>
        </div>



        <footer style="background-color: #bda77d; ">
            @section('footer')
                <h3>bla bla bal...</h3>
            @show
        </footer>

        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        
        <script>
            $(".btn-modal").click(function() {
                $(this).parent().find('.modal').fadeIn(500).css('background-color', 'rgba(26, 36, 47, 0.75)');
            });

            $(".close, .btn-cancel").click(function() {
                $(this).parent().parent().parent().parent().parent().find('.modal').fadeOut(500);
            });

        </script>
    </body>
</html>