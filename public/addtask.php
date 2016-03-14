<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if title is empty
        if (empty($_POST["title"]))
        {
            apologize("Please enter a title for your task");
        }
        
        // validate length of title and description
        if ((strlen($_POST["title"]) > 500) || (strlen($_POST["description"]) > 5000))
        {
            apologize("Oops! Your title/description is too long");
        }
        
        else
        {
            // insert into database
            $insert = CS50::query("INSERT INTO tasks(title, description, owner_id, collaborator_1, collaborator_2, collaborator_3, is_complete) VALUES (?, ?, ?, ?, ?, ?, FALSE)", $_POST["title"], $_POST["description"], $_SESSION["id"], strtolower($_POST["collaborator_1"]), strtolower($_POST["collaborator_2"]), strtolower($_POST["collaborator_3"]));
            if ($insert == false)
            {
                apologize("Sorry, there was a problem saving your task");
            }
            
            // redirect to dashboard
            redirect("index.php");
        }
    }
    else
    {
        // render form
        render("addtask_form.php", ["title" => "Add Task"]);
    }
?>