<?php

//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?'); 

//get uri pieces
$uriArray = explode("/", $uri);
//var_dump($uriArray);

// Associative array
$items = [
    "name" => "Pinecone",
    "category" => "Luxury Pets",
    "price" => 40000,
    "availability" => "In Stock"
];


// Get the keys of the array
$keys = array_keys($items);

// Use a for loop to iterate through the array
for ($i = 0; $i < count($keys); $i++) {
    $key = $keys[$i];
    echo ucfirst($key) . ": " . $items[$key] . "<br>";
}

// Function with return type, optional parameter, and typed parameter
function formatItem(string $item, int $price = 0): string {
    return "The item: " . ucfirst($item) . " costs $" . number_format($price);
}

// Call function with correct types
echo "<br>" . formatItem("pinecone", 40000); 
echo "<br>" . formatItem("jaguar"); // Uses the default price value


?>