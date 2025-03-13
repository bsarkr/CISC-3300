<?php

/*
controller.php
Homework 7
Bilash Sarkar
Prof. Hishon
3-13-25
*/

namespace homework7\controllers;

class noteController{
    //This class validates submitted data

    public function createNote(){

        if($_SERVER['REQUEST_METHOD'] === 'POST') //checks if form was submitted
        {
            //adding input validation
            $title = htmlspecialchars($_POST['title']); //initializing title
            $description = htmlspecialchars($_POST['description']); //initializing description

            if(strlen($title)<3){ //checking if title is too short
                header("Location: index.php?page=add-note&error=Title must be at least 3 characters long!"); //changes the url to appropriate error
                exit();
            }

            if(strlen($description)<10){ //checking if the description is too short
                header("Location: index.php?page=add-note&error=Description must be at least 10 characters long!"); //changes the url to appropriate error
                exit();
            }

            //changes url to appropriate success url
            header("Location: index.php?page=add-note&success=1");
            exit();
            
        }
        header("Location: index.php?page=add-note&error=Invalid request"); //in case none of the above work
        exit();

    }

}