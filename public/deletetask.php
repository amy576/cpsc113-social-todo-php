<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by submitting a form via GET)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // check that the user owns the task
        $task_owner = CS50::query("SELECT owner_id FROM tasks WHERE id = ?", $_GET['delete-task']);
        if ($task_owner[0]["owner_id"] != $_SESSION["id"])
        {
            apologize("Sorry, you do not have permission to delete that task");
        }
        
        else if ($task_owner[0]["owner_id"] == $_SESSION["id"])
        {
            $delete = CS50::query("DELETE FROM tasks WHERE id = ?", $_GET['delete-task']);
        
            if ($delete == false)
            {
                apologize("Sorry, there was a problem deleting that task");
            }
                
            // redirect to dashboard
            redirect("index.php");
        }
        
    }
    else
    {
        // redirect to dashboard
        redirect("index.php");
    }
?>