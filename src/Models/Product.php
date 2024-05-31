<?php

namespace Debian\Audiofile\Models;

use PDO;

use Debian\Audiofile\Models\Model;
use Debian\Audiofile\Routes\Router;

class Product extends Model
{
    protected ?int $id;
    protected string $productname;
    protected string $description;
    protected float $price;
    protected string $stock;
    protected string $dateadded;
    protected int $categoryid;
    protected static $table = "products";

    public static array $fields;
    public function __construct($args)
    {

        var_dump($args);
        $this->id = $args['id'];
        $this->productname = $args['productname'];
        $this->price = $args['price'];
        $this->stock = $args['stock'];
        $this->dateadded = $args['dateadded'];
        $this->categoryid = $args['category'];

        static::$fields = $args;
    }

    public function validateData()
    {
        $this->validation->validate(static::$fields);
    }
}