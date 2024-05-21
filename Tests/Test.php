<?php

namespace Tests;

use Debian\Audiofile\Models\Tracks;

class Test
{
    public static function main()
    {

        $args = [
            'id' => null,
            'title' => "Technobox",
            'artist' => "DSigual",
            'album' => "DSigual vol.4",
            'release_date' => "1998-12-20",
            'genre_id' => 2
        ];


        $track = new Tracks($args);
        $id = $track->exec(); //id = 3;

        echo "create:" . PHP_EOL;
        $create = $track->create();
        var_dump($create);

        echo "read:" . PHP_EOL;
        $read = $track->read(); //where id
        var_dump($read);

        echo "all:" . PHP_EOL;
        $all = $track::all();
        var_dump($all);

        echo "find:" . PHP_EOL;
        $find = $track::find($id);
        var_dump($find);

        echo "delete:" . PHP_EOL;
        $delete = $track->delete();
        var_dump($delete);

        echo "all:" . PHP_EOL;
        $all = $track::all();
        var_dump($all);
    }
}