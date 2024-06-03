<?php

namespace Debian\Audiofile\Controllers;

use Debian\Audiofile\Routes\Router;
use Debian\Audiofile\Models\Product;
use Debian\Audiofile\Controllers\Controller;
use function Debian\Audiofile\Helpers\dd;

class ProductsController extends Controller
{

    public static function index(Router $router)
    {
        $data = Product::all();
        $router->view("products/products", $data);
    }

    public static function create(Router $router)
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST;
            $product = new Product($args);
        }

        $args = null;
        $router->view("products/create", $args);
    }
}