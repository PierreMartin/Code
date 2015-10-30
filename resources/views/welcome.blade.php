@extends('layouts.default')


@section('content')
    <h1>CØDE</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <ul>
        <li><a href="{{ url('posts') }}">Voir les postes</a></li>
        <li><a href="#">Voir les catégories</a></li>
        <li><a href="#">contact</a></li>
    </ul>
    ou <br>
    <a href="{{  url('/auth/login') }}">Se connecter à l'administration</a>
    <br>
    <a href="{{  url('/auth/register') }}">S'inscrire</a>
@endsection

@section('footer')
    @parent
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
@endsection