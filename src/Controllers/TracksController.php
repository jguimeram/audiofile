<?php

namespace Debian\Audiofile\Controllers;

use Debian\Audiofile\Models\Tracks;
use Debian\Audiofile\Routes\Router;

class TracksController extends Controller
{

    public static function index(Router $router)
    {
        $data = Tracks::all();
        $router->view("Home/Home", $data);
    }

    public static function create(Router $router)
    {
    }
}