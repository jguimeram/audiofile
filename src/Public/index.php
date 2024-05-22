<?php

require_once __DIR__ . '/../bootstrap.php';

use Tests\Test;
use Debian\Audiofile\Routes\Router;
use Debian\Audiofile\Controllers\Controller;
use Debian\Audiofile\Controllers\TracksController;
use Debian\Audiofile\Controllers\UsersController;

$router = new Router;

$router->get("/", [TracksController::class, 'index']);


$router->run();


//Test::main();