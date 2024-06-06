<?php

namespace Debian\Audiofile\Models;


use PDO;
use Debian\Audiofile\Models\Model;
use function Debian\Audiofile\Helpers\dd;

class Product extends Model
{
    protected int $id;
    protected string $productname;
    protected string $description;
    protected string $price;
    protected string $stock;
    protected int $categoryid;
    protected static $table = "products";
    public static array $fields;
    public function __construct($args)
    {
        //TODO: fix casting
        $args['categoryid'] = (int)$args['categoryid'];
        $args['id'] = (int)$args['id'];
        $this->productname = $args['productname'];
        $this->description = $args['description'];
        $this->price = $args['price'];
        $this->stock = $args['stock'];
        $this->categoryid = $args['categoryid'];
        $this->id = $args['id'];

        static::$fields = $args;
    }
}