<?php

namespace Debian\Audiofile\Database;


use PDO;
use PDOException;


class Connection
{

    private static $pdo;
    private static $dsn = 'mysql:host=localhost;dbname=audio';
    private static $username = 'root';
    private static $password = 'admin84';


    public static function database()
    {
        try {
            static::$pdo = new PDO(static::$dsn, static::$username, static::$password);
            // Additional configuration or setup if needed
        } catch (PDOException $e) {
            // Handle connection error
            die("Connection failed: " . $e->getMessage());
        }
        return static::$pdo;
    }
}