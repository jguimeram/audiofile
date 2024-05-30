<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Debian\Audiofile\Models\Model;
use Debian\Audiofile\Database\Connection;
use Debian\Audiofile\Services\Validation;


$conn = Connection::database();
$val = new Validation();
$model = new Model(validation: $val);
$model->connectToDatabase($conn);