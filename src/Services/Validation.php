<?php

namespace Debian\Audiofile\Services;

use function Debian\Audiofile\Helpers\dd;

class Validation
{
    protected array $args;
    protected array $errors;
    public function validate($args)
    {
        $this->args = $args;
        $this->sanitizer();
    }

    public function isEmpty()
    {
        empty($this->args['productname']) ? $this->errors[] = "product name empty field" : "";
        empty($this->args['description']) ? $this->errors[] = "description empty field" : "";
        empty($this->args['price']) ? $this->errors[] = "price empty field" : "";
        empty($this->args['stock']) ? $this->errors[] = "stock empty field" : "";
        empty($this->args['category']) ? $this->errors[] = "category empty field" : "";
    }

    public function sanitizer()
    {
        $this->args['productname'] = htmlspecialchars($this->args['productname'], ENT_QUOTES, 'UTF-8');
        $this->args['description'] = htmlspecialchars($this->args['description'], ENT_QUOTES, 'UTF-8');
        $this->args['price'] = htmlspecialchars($this->args['price'], ENT_QUOTES, 'UTF-8');
        $this->args['stock'] = htmlspecialchars($this->args['stock'], ENT_QUOTES, 'UTF-8');
        $this->args['category'] = htmlspecialchars($this->args['category'], ENT_QUOTES, 'UTF-8');
    }

    public function getErrorsArray(): ?array
    {
        return $this->errors;
    }
}