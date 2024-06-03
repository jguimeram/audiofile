<?php

namespace Debian\Audiofile\Models;

use PDO;
use Debian\Audiofile\Models\Model;


class Product extends Model
{
    protected ?int $id;
    protected string $productname;
    protected string $description;
    protected string $price;
    protected string $stock;
    protected string $categoryid;
    protected static $table = "products";
    public static array $fields;
    public function __construct($args)
    {
        $this->productname = $args['productname'];
        $this->description = $args['description'];
        $this->price = $args['price'];
        $this->stock = $args['stock'];
        $this->categoryid = $args['category'];

        static::$fields = $args;
    }

    public function validateData()
    {
        $this->validation->validate(static::$fields);
    }
}