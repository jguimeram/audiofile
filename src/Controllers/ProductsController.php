<?php

namespace Debian\Audiofile\Controllers;

use Debian\Audiofile\Routes\Router;
use Debian\Audiofile\Models\Product;
use Debian\Audiofile\Controllers\Controller;

class ProductsController extends Controller
{

    public static function index(Router $router)
    {
        $data = Product::all();
        $router->view("products/products", $data);
    }

    public static function create(Router $router)
    {

        /*
        TODO:
        Define reference by select id + 1;
        Create validation process in model
        */

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST;
            $product = new Product($args);
            $product->validation();
        }

        $args = null;
        $router->view("products/create", $args);
    }
}