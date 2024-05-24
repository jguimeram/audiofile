<?php

require_once __DIR__ . '/../bootstrap.php';

use Tests\Test;
use Debian\Audiofile\Routes\Router;
use Debian\Audiofile\Controllers\Controller;
use Debian\Audiofile\Controllers\HomeController;
use Debian\Audiofile\Controllers\ProductsController;


$router = new Router;

$router->get("/", [HomeController::class, 'index']);
$router->get("/products", [ProductsController::class, 'index']);
$router->post("/products/create", [ProductsController::class, 'create']);


$router->run();


//Test::main();