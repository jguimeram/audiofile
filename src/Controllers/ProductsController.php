<?php

namespace Debian\Audiofile\Controllers;

use Exception;
use Debian\Audiofile\Routes\Router;
use Debian\Audiofile\Models\Product;
use function Debian\Audiofile\Helpers\dd;
use Debian\Audiofile\Services\FlashMessage;
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
                throw new Exception("Product creation failed");
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

            //TODO: delete

            $id = $_POST['id'];
            Product::find($id);
        }

        $data = Product::all();
        $router->view("products/products", $data);
    }

    public static function update(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $args = $_POST;

            $id = (int)$args['id'];

            $productId = Product::find($id);

            if ($productId[0]['id'] !== $id) {
                throw new Exception('The ID of the product does not match with POST id parameter', 420);
            }
            $product = new Product($args);
            $res = $product->update();
            if ($res) {
                header('Location: /products');
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            /**
             * 
             * @param Product::find @return array
             */
            $args = Product::find($router->id);
            $data = [
                'args' => $args,
            ];
            $router->view("products/edit", $data);
        }
    }
}