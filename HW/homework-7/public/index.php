<?php

/*
index.php
Homework 7
Bilash Sarkar
Prof. Hishon
3-13-25
*/

    require_once __DIR__ . '/../controllers/controller.php'; //loaoding controller.php

    $page = isset($_GET['page']) ? $_GET['page'] : 'add-note'; //defining a page variable by checking if 'page' is in the url
    $controller = new homework7\controllers\noteController(); //creating an instance of notecontroller;

    //determines what to load based on what's in the url which we set in the controller file
    if($page === 'add-note'){
        require_once __DIR__ . '/../Form/noteForm.php';
    }
    else if($page === 'save-note'){
        $controller->createNote();
    }
    else{
        echo "<h1>Page Not Found</h1>"; //an error message in case the above doesn't work
    }

?>

