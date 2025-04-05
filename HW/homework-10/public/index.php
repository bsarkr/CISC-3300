<?php
require_once "../app/models/Model.php";
require_once "../app/models/Product.php";
require_once "../app/controllers/ProductController.php";

//set our env variables, remember con
$env = parse_ini_file('../.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\ProductController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//0 = ""
//1 = api
//2 = users
//3 = id


//get all or a single user
if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    //only id
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $productController = new ProductController();

    if ($id) {
        $productController->getProductByID($id);
    } else {
        $productController->getProducts();
    }
}

//save product
if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $productController = new ProductController();
    $productController->saveProduct();
}

//update product
if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $productController = new ProductController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $productController->updateProduct($id);
}

//delete product
if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $productController = new ProductController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $productController->deleteProduct($id);
}


//views

if ($uriArray[1] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $productController = new ProductController();

    if ($id) {
        $productController->productDetailsView();
    } else {
        $productController->productsView();
    }

}

if($uriArray[1] === 'productDetails' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productDetailsView();
}

if ($uri === '/new-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsAddView();
}

if ($uriArray[1] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsUpdateView();
}

if ($uriArray[1] === 'delete-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsDeleteView();
}


// GET route for update: shows the update form when accessing /update/{id}
if ($uriArray[1] === 'update' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsUpdateView();
    exit();
}

// POST route for update: processes the form submission
if ($uriArray[1] === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $productController = new ProductController();
    $productController->updateProduct($id);
    exit();
}

//if no uri is given, show the products page

/*
if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsView();
}
*/

include '../public/assets/views/notFound.html';
exit();

?>


