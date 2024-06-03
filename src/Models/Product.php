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
    protected int $categoryid;
    protected static $table = "products";
    public static array $fields;
    public function __construct($args)
    {
        $args['categoryid'] = (int)$args['categoryid'];

        $this->productname = $args['productname'];
        $this->description = $args['description'];
        $this->price = $args['price'];
        $this->stock = $args['stock'];
        $this->categoryid = $args['categoryid'];

        static::$fields = $args;
    }
}