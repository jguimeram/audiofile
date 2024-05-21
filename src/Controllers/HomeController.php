<?php

namespace Debian\Audiofile\Controllers;

use Debian\Audiofile\Routes\Router;

class HomeController extends Controller
{
    public static function index(Router $router)
    {
        $router->view('Home/Home', null);
    }
}