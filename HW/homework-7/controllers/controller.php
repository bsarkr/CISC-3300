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

        //responses erray to store a status and a message
        $response = ["status" => "error", "message" => "something went wrong :("]; //setting a default response incase something doesn't work

        if($_SERVER['REQUEST_METHOD'] === 'POST') //checks if form was submitted
        {
            //adding input validation
            $title = htmlspecialchars($_POST, ['title']); //initializing title
            $description = htmlspecialchars($_POST, ['description']); //initializing description

            if(strlen($title)<3){ //checking if title is too short
                $response["message"] = "Title must include more than 3 characters :/"; //updating response message
                echo json_encode($response); 
                return;
            }

            if(strlen($description)<10){ //checking if the description is too short
                $response["message"] = "Description must include more than 10 characters!!"; //updating response message
                echo json_encode($response);
                return;
            }

            //updating response for when note is submitted w/ no errors
            $response["status"] = "Success";
            $response["message"] = "Note Submitted Successfully";
            
        }
        echo json_encode($response);

    }

}