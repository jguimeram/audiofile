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
        parent::__construct($this->validation);

        $this->id = $args['id'];
        $this->productname = $args['productname'];
        $this->price = $args['price'];
        $this->stock = $args['stock'];
        $this->dateadded = $args['dateadded'];
        $this->categoryid = $args['category'];


        foreach ($args as $key => $value) {
            if ($key === 'id') {
                continue;
            }
            static::$fields[$key] = $value;
        }
    }

    public function validateData()
    {
        $this->validation->validate(static::$fields);
    }
}