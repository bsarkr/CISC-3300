<?php

require_once "app/models/model.php";
require_once "app/models/post.php";

use app\models\Post;

// Load database credentials from .env
$env = parse_ini_file('.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBPORT', $env['DBPORT']);

$postModel = new Post();

if ($_SERVER['REQUEST_URI'] === '/posts') {
    $posts = $postModel->findAll();

    header('Content-Type: application/json');
    echo json_encode($posts);
    exit();
}

?>