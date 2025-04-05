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

        if($_SERVER['REQUEST_METHOD'] !== "POST"){
            echo json_encode(["status" => "error", "message" => "Invalid request"]); //updating error message
            exit();
        }
        else if($_SERVER['REQUEST_METHOD'] === "POST"){ //checking if this is a post request first.
            
            $title = htmlspecialchars($_POST['title']); //initializing title
            $description = htmlspecialchars($_POST['description']); //initializing description

            if(strlen($title)<3){ //checking if title is too short
                echo json_encode(["status" => "error", "message" => "Title must be at least 3 characters long!"]); //updating error message
                exit();
            }

            if(strlen($description)<10){ //checking if the description is too short
                echo json_encode(["status" => "error", "message" => "Description must be at least 10 characters long!"]); //updating error message
                exit();
            }
        }
        
        echo json_encode(["status" => "success", "message" => "Note Successfully Created"]); //updating success message
        exit();

    }
}