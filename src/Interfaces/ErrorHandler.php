<?php

namespace Debian\Audiofile\Interfaces;


interface ErrorHandler
{
    public static function setErrorMessage();
    public static function getErrorMessage(): string;
}