<?php

namespace Debian\Audiofile\Routes;

class Router
{
    protected array $getUrl = [];
    protected array $postUrl = [];
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
        $url = $_SERVER['REQUEST_URI'] ?? "/";

        if ($method === 'GET') {
            $fn = $this->getUrl[$url] ?? null;
        } else {
            $fn = $this->postUrl[$url] ?? null;
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