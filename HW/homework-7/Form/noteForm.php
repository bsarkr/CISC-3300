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

    <title>Notes</title>

    <body>

        <?php if(isset($_GET['success'])): ?> <!--Checks if 'success is in the url-->
            <p class = "success">Note Successfully Created</p>
        <?php endif; ?>

        <?php if(isset($_GET['error'])): ?>
            <p class = "error"><?= htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <!--creating the form-->
        <form action="index.php?page=save-note" method="POST">

            <label for = "title">Title</label> <!--Promping from a note title-->
            <input type = "text" id = "Title" name  = "title" required>

            <label for = "description">Description</label> <!--Prompting for a note decription-->
            <textarea></textarea> <!--using a textarea because description is longer-->

            <button type = 'submit'> Submit </button> <!--Submitting the form-->

        </form>

    <body>

</html> 

