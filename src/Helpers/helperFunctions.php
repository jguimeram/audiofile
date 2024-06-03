<?php

namespace Debian\Audiofile\Helpers;

function dd($args)
{
    echo "<pre>";
    var_dump($args);
    echo "</pre>";
    die();
}

function dump($args)
{
    echo "<pre>";
    var_dump($args);
    echo "</pre>";
}