<?php

declare(strict_types=1);

namespace Debian\Audiofile\Controllers;

use Debian\Audiofile\Interfaces\ErrorHandler;
use Debian\Audiofile\Routes\Router;

class HomeController extends Controller implements ErrorHandler
{
    public static function index(Router $router)
    {
        $router->view('home/index', null);
    }

    public static function setErrorMessage()
    {
    }

    public static function getErrorMessage(): string
    {
        return "hello";
    }
}