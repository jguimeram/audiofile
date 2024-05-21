<?php

namespace Debian\Audiofile\Models;

use PDO;

use Debian\Audiofile\Models\Model;
use Debian\Audiofile\Routes\Router;

class Tracks extends Model
{
    protected ?int $id;
    protected string $title;
    protected string $artist;
    protected string $album;
    protected string $release_date;
    protected int $genre_id;

    protected static $table = "tracks";
    public function __construct($args)
    {
        $this->id = $args['id'];
        $this->title = $args['title'];
        $this->artist = $args['artist'];
        $this->album = $args['album'];
        $this->release_date = $args['release_date'];
        $this->genre_id = $args['genre_id'];


        foreach ($args as $key => $value) {
            if ($key === 'id') {
                continue;
            }
            static::$fields[$key] = $value;
        }
    }
}