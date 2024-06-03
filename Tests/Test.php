<?php

namespace Tests;

use FFI;
use Debian\Audiofile\Models\Tracks;
use Debian\Audiofile\Services\FlashMessage;
use function Debian\Audiofile\Helpers\dd;
use function Debian\Audiofile\Helpers\dump;

class Test
{
    public static function flash()
    {
        dump($_SESSION['flash_message']);
        $flash = new FlashMessage();
        $flash->setFlashMessage('products', 'product created successfully', 'success');
        dump($_SESSION['flash_message']);
        $msg = $flash->getFlashMessage();
        echo $msg;
        $flash->closeSession();
        dump($_SESSION['flash_message']);
    }
}