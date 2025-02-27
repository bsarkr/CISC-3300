<?php



//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//var_dump($uriArray);

if (empty($uriArray[0])) {
    
    include 'inclass13.html';
    exit();
}


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

?>






