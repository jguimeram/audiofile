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
        $args = array();

        $args['track_id'] = null;
        $args['title'] = "Welcome to tomorrow";
        $args['artist'] = "Miss Peppermint";
        $args['album'] = "Welcome to tomorrow EP";
        $args['release_date'] = "1998-05-17";
        $args['genre_id'] = 2;

        $track = new Tracks($args);
        $res = $track->create();
        if (!$res) {
            throw new \Exception("insert not created succesfully");
        }
    }
}