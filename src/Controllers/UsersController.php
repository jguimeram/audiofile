<?php

namespace Debian\Audiofile\Controllers;

use Debian\Audiofile\Routes\Router;

class UsersController extends Controller
{
    public static function index(Router $router)
    {
        $router->view('users/users', null);
    }
}