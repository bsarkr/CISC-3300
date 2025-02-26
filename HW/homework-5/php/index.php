<!--
Bilash Sarkar
Prof. Hishon
HW 5
2-27-25

PHP setup
-->

<?php

//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//var_dump($uriArray);

if ($uriArray[1] === 'clients' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $clients = [
        [
            'name' => 'pinecone',
            'price' => '40000'
        ],
        [
            'name' => 'jaguar',
            'price' => '420420'
        ]
    ];

    echo json_encode($clients);
    exit();
}

if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'Success'
    ]);
    exit();
}
?>


