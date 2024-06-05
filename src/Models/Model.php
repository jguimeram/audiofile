<?php

namespace Debian\Audiofile\Models;

use PDO;
use Debian\Audiofile\Services\Validation;
use Debian\MvcTemplate\Database\Connection;
use function Debian\Audiofile\Helpers\dd;

class Model
{
    protected static $pdo;
    protected static $table;
    public static array $fields;
    protected int $id;
    protected object $validation;


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
        $params = array_values(static::$fields);
        $keys = $this->getArrayKeys();
        $placeholders = str_replace(",", "=?, ", $keys) . "=?";
        $query = "UPDATE " . static::$table . " SET " . $placeholders;
        $query .= " WHERE id={$this->id}";
        return static::$pdo->prepare($query)->execute($params);
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
    public static function find(int $id): array
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id=?";
        $stmt = static::$pdo->prepare($query);
        $stmt->execute([$id]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    public static function sync($args)
    {
        static::$fields = $args;
    }

    public function getArrayKeys(): ?string
    {
        return implode(',', array_keys(static::$fields));
    }

    public function getArrayValues(): ?string
    {
        return implode(',', array_values(static::$fields));
    }
}