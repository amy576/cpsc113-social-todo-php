<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by submitting a form via GET)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $completed = CS50::query("UPDATE tasks SET is_complete=1")
        
        echo("Got");
        
        echo($_GET['toggle-task']);
        // if(!empty($_POST['checked_tasks']))
        // {
        
        // foreach($_POST['checked_tasks'] as $selected){
        //     echo $selected."</br>";
        
        // }
        // }
        
        // foreach($_POST['checked_tasks'] as $item)
        // {
        // // query to delete where item = $item
        //     if(isset($item))
        //     {
        //         $completed = CS50::query("UPDATE tasks SET is_complete=1 WHERE id = ?",)
        //     }
            
            
        // }
        
        // // insert into database
        //     $insert = CS50::query("INSERT INTO tasks(title, description, owner_id, collaborator_1, collaborator_2, collaborator_3, is_complete) VALUES (?, ?, ?, ?, ?, ?, FALSE)", $_POST["title"], $_POST["description"], $_SESSION["id"], strtolower($_POST["collaborator_1"]), strtolower($_POST["collaborator_2"]), strtolower($_POST["collaborator_3"]));
        //     if ($insert == false)
        //     {
        //         apologize("Sorry, there was a problem saving your task");
        //     }
            
            // redirect to dashboard
            redirect("index.php");
    }
    else
    {
        // redirect to dashboard
        redirect("index.php");
    }
?>