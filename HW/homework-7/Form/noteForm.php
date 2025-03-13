<?php

/*
noteForm.php
Homework 7
Bilash Sarkar
Prof. Hishon
3-13-25
*/

require_once __DIR__ . '/../controllers/controller.php';

?>

<html>

    <style>

        .success{
            color: green;
            font-weight: bold;
        }

        .error{
            color: red;
            font-weight: bold;
        }

        body{
            padding: 30px;
        }

        form{
            max-width: 300px;
            margin-top: 30px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        label{
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        textarea{
            height: 100px;
            width: 300px
        }

        button{
            display: block;
            margin-top: 20px;
            
        }

    </style>

    <title>Notes</title>

    <body>

        <?php if(isset($_GET['success'])): ?> <!--Checks if 'success' is in the url-->
            <p class = "success">Note Successfully Created</p>
        <?php endif; ?>

        <?php if(isset($_GET['error'])): ?> <!--Checks if 'error' is in the url-->
            <p class = "error"><?= htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <!--creating the form-->
        <form action="index.php?page=save-note" method="POST">

            <label for = "title">Title</label> <!--Promping from a note title-->
            <input type = "text" id = "Title" name  = "title" required>

            <label for = "description">Description</label> <!--Prompting for a note decription-->
            <textarea id = "description" name = "description"></textarea> <!--using a textarea because description is longer-->

            <button type = 'submit'> Submit </button> <!--Submitting the form-->

        </form>

    <body>

</html> 

