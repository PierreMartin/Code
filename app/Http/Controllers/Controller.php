<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use View;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // METHODE QUI VA ETRE EXECUTER PARTOUT :
    public function __construct() {

        View::composer('layouts.default', function ($view) {
             $view->with('categories', Category::all());
        });

        View::composer('layouts.dashboard', function ($view) {
             $view->with('username', Auth::all());
        });

    }

}
