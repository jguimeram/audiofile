<?php

namespace Debian\Audiofile\Routes;

use function Debian\Audiofile\Helpers\dd;

class Router
{
    protected array $getUrl = [];
    protected array $postUrl = [];
    protected string $url;

    public int $id;
    public function get($url, $fn)
    {
        $this->getUrl[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postUrl[$url] = $fn;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? null;
        $this->url = $_SERVER['REQUEST_URI'] ?? "/";

        if (preg_match('/\/(\d+)(\/|$)/', $this->url, $matches)) {
            $this->url = preg_replace('/\/(\d+)(\/|$)/', '/:id', $this->url); //replace
            $this->id = $matches[1] ?? null; //get the id value from url
        }

        if ($method === 'GET') {
            $fn = $this->getUrl[$this->url] ?? null;
        } else {
            $fn = $this->postUrl[$this->url] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            header("Location: /404");
        }
    }

    public function view(string $view, mixed $data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }

        ob_start();
        include __DIR__ . "/../Views/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/../Views/layout.php";
    }
}