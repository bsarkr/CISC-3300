<?php

namespace app\controllers;

use app\models\Product;

class ProductController
{

    public function validateProduct($inputData) {
        $errors = [];
        $name = $inputData['name'];
        $description = $inputData['description'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['NameShort'] = 'name is too short';
            }
        } else {
            $errors['requiredName'] = 'name is required';
        }

        if ($description) {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($description) < 5) {
                $errors['description'] = 'description is too short';
            }
        } else {
            $errors['requiredDescription'] = 'description is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'name' => $name,
            'description' => $description,
        ];
    }


    public function getProducts() {
        $productModel = new Product();
        $query = !empty($_GET['name']) ? $_GET['name'] : null;
        $products = $productModel->getProducts($query);
        echo json_encode($products);
        exit();
    }

    public function getProductByID($id) {
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        echo json_encode($product);
        exit();
    }

    public function saveProduct() {
        $inputData = [
            'name' => $_POST['name'] ?: null,
            'description' => $_POST['description'] ?: null,
        ];
        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->saveProduct(
            [
                'name' => $productData['name'],
                'description' => $productData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    //updating the nameing for all of these
    public function updateProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'name' => $_PUT['name'] ?: null,
            'description' => $_PUT['description'] ?: null,
        ];


        $productData = $this->validateProduct($inputData);
        //we could save the data off to be saved here

        $product = new Product();
        $product->updateProduct(
            [
                'id' => $id,
                'name' => $productData['name'],
                'description' => $productData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $product = new Product();
        $product->deleteProduct(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function productsView() {
        include '../public/assets/views/product/product.html';
        exit();
    }

    public function productDetailsView() {
        include '../public/assets/views/product/productDetails.html';
        exit();
    }

    //updating the naming and file path probs

    public function productsAddView() {
        include '../public/assets/views/product/products-add.html';
        exit();
    }

    public function productsDeleteView() {
        include '../public/assets/views/product/products-delete.html';
        exit();
    }

    public function productsUpdateView() {
        include '../public/assets/views/product/products-update.html';
        exit();
    }

}