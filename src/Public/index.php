<?php

require_once __DIR__ . '/../bootstrap.php';

use Tests\Test;
use Debian\Audiofile\Routes\Router;
use Debian\Audiofile\Controllers\Controller;
use Debian\Audiofile\Controllers\TracksController;


$router = new Router;

/* $router->get("/", [Controller::class, 'index']);
$router->get("/tracks", [TracksController::class, 'index']);
$router->get("/tracks/create", [TracksController::class, 'create']);

$router->run();
 */

Test::main();