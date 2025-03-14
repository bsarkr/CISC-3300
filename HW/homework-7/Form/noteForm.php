<?php

/*
noteForm.php
Homework 7
Bilash Sarkar
Prof. Hishon
3-13-25
*/

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
        <p id = "message"></p> <!--shows success or error message-->

        <form id = "note-form">

            <label for = "title">Title</label> <!--Promping for a note title-->
            <input type = "text" id = "title" name  = "title" required>

            <label for = "description">Description</label> <!--Prompting for a note decription-->
            <textarea id = "description" name = "description"></textarea> <!--using a textarea because description is longer-->

            <button type = 'submit'> Submit </button> <!--Submitting the form-->

        </form>

        <script>

            document.getElementById("note-form").addEventListener("submit", function (event) {
                event.preventDefault(); //stops the page from refreshing when the form is submitted.

                //getting the form input values
                const title = document.getElementById("title").value;
                const description = document.getElementById("description").value;

                //sending daa to server using POST
                fetch("index.php?page=save-note", {
                    method: "POST",
                    headers: {"Content-Type": "application/x-www-form-urlencoded" },
                    body: `title=${encodeURIComponent(title)}&description=${encodeURIComponent(description)}`
                })

                    .then(response => response.json()) //parses json response
                    .then(data => {
                        //console.log("Server Response:", data); debugging
                        const messageElement = document.getElementById("message");
                        messageElement.textContent = data.message; //updating the message
                        messageElement.className = data.status; //for styling
                    })
                    .catch(error => console.error("Error:", error)); //for errors
            });

        </script>

    </body>

</html> 
