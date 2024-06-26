<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Debian\Audiofile\Models\Model;
use Debian\Audiofile\Database\Connection;
use Debian\Audiofile\Services\Validation;


$conn = Connection::database();
$model = new Model();
$model->connectToDatabase($conn);