<?php

namespace Debian\Audiofile\Controllers;

use Debian\Audiofile\Routes\Router;
use Debian\Audiofile\Models\Product;
use Debian\Audiofile\Controllers\Controller;
use Debian\Audiofile\Services\FlashMessage;
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
            $save = $product->create();
            if ($save) {
                $flashMessage = new FlashMessage();
                $flashMessage->setFlashMessage('products', 'product created successfully', 'success');
                $message = $flashMessage->getFlashMessage();
                $args = [
                    'message' => $message
                ];
            } else {
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $args = null;
        }

        $router->view("products/create", $args);
    }

    public static function delete(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            /**
             * get the id of the product to delete
             * call delete method
             */

            $id = 0;
            Product::find($id);
        }

        $data = Product::all();
        $router->view("products/products", $data);
    }
}