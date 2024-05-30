<?php

namespace Debian\Audiofile\Models;

use PDO;
use Debian\Audiofile\Services\Validation;
use Debian\MvcTemplate\Database\Connection;

class Model
{
    protected static $pdo;
    protected static $table;
    public static array $fields;
    protected ?int $id;

    protected $validation;

    public function __construct(Validation $validation)
    {
        $this->validation = $validation;
    }
    public function connectToDatabase(PDO $pdo)
    {
        static::$pdo = $pdo;
    }
    public function create(): bool
    {
        $keys = $this->getArrayKeys();
        $placeholders = str_repeat('?,', count(static::$fields) - 1) . '?';
        $query = "INSERT INTO " . static::$table . " ($keys) VALUES ($placeholders)";
        return static::$pdo->prepare($query)->execute(array_values(static::$fields));
    }
    public function read(): array
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id=?";
        $stmt = static::$pdo->prepare($query);
        $stmt->execute([$this->id]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function update(): bool
    {
        $keys = array_keys(static::$fields);

        $placeholders = "";

        foreach ($keys as $values) {
            $placeholders .= "$values=? ";
        }

        $query = "UPDATE " . static::$table . "SET";
        $query = "UPDATE users SET $placeholders";
        $query .= "WHERE id=?";

        return static::$pdo->prepare($query)->execute(static::$fields);
    }
    public function delete(): bool
    {
        $query = "DELETE FROM " . static::$table . " WHERE id=?";
        return static::$pdo->prepare($query)->execute([$this->id]);
    }

    public static function all(): array
    {
        $query = "SELECT * FROM " . static::$table;
        $stmt = static::$pdo->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function find(int $id)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id=?";
        $stmt = static::$pdo->prepare($query);
        $stmt->execute([$id]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    public static function getLastId($id): int
    {

        /**
         * TODO:
         * Get last id from the records;
         */
        return ($id) ? $id :  null;
    }

    public function getArrayKeys(): ?string
    {
        return implode(',', array_keys(static::$fields));
    }

    public function getArrayValues(): ?string
    {
        return implode(',', array_values(static::$fields));
    }
    public function exec(): int
    {
        return $this->id = 3;
    }
}