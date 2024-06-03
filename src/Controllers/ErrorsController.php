<?php

namespace Debian\Audiofile\Controllers;

use Debian\Audiofile\Routes\Router;

class ErrorsController extends Controller
{
    public static function error(Router $router)
    {
        $router->view('errors/404', null);
    }
}