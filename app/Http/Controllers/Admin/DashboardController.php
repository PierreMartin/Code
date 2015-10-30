<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\Guard;        // add
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Guard $auth)
    {
        $username   = $auth->user()->name;
        $email      = $auth->user()->email;

        return view('dashboard.home.index', compact('username', 'email'));
    }
}