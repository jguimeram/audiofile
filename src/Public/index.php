<?php
session_start();
require_once __DIR__ . '/../bootstrap.php';

use Tests\Test;
use Debian\Audiofile\Routes\Router;
use Debian\Audiofile\Controllers\Controller;
use Debian\Audiofile\Controllers\HomeController;
use Debian\Audiofile\Controllers\UsersController;
use Debian\Audiofile\Controllers\ErrorsController;
use Debian\Audiofile\Controllers\ProductsController;
use function Debian\Audiofile\Helpers\dd;



$router = new Router;

$router->get("/", [HomeController::class, 'index']);

$router->get("/users", [UsersController::class, 'index']);

$router->get("/products", [ProductsController::class, 'index']);


$router->get("/products/create", [ProductsController::class, 'create']);
$router->post("/products/create", [ProductsController::class, 'create']);

$router->get("/products/update/:id", [ProductsController::class, 'update']);
$router->post("/products/update", [ProductsController::class, 'update']);

$router->get("/products/delete", [ProductsController::class, 'delete']);
$router->post("/products/delete", [ProductsController::class, 'delete']);


$router->get("/404", [ErrorsController::class, 'error']);


$router->run(); 


//Test::main();