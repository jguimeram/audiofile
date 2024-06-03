<?php

namespace Debian\Audiofile\Services;

use Exception;
use function Debian\Audiofile\Helpers\dd;

/**
 * Summary of FlashMessage
 * <div class="alert alert-primary" role="alert"> blue
 * A simple primary alert—check it out!
 * </div>

 *<div class="alert alert-success" role="alert"> green
 *  A simple success alert—check it out!
 *</div>
 *<div class="alert alert-danger" role="alert"> red
 *  A simple danger alert—check it out!
 *</div>
 *<div class="alert alert-warning" role="alert"> yellow
 *  A simple warning alert—check it out!
 *</div>
 *<div class="alert alert-info" role="alert"> sky
 *  A simple info alert—check it out!
 *</div>
 */

class FlashMessage
{
    protected array $flash_message;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE)
            throw new Exception("Session not started");
    }
    public function setFlashMessage($name, $message, $type)
    {
        $this->flash_message = $_SESSION['flash_message'][$name] =
            [
                'message' => $message,
                'type' => $type,
            ];
    }

    public function getFlashMessage(): string
    {
        if (empty($this->flash_message)) {
            throw new Exception("no flash system created", 2);
        }

        $type = $this->flash_message['type'];
        $message = $this->flash_message['message'];
        //position-absolute top-0 w-100 start-10
        return "<div class='alert alert-{$type}' id='flash' role='alert'>{$message}</div>";
    }



    public function closeSession()
    {
        unset($_SESSION['flash_message']);
    }
}