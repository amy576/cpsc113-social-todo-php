<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by submitting a form via GET)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        // set is_complete to 1 (true, a.k.a. yes it is complete)
        $complete = CS50::query("UPDATE tasks SET is_complete=1 WHERE id = ?", $_GET['toggle-task']);
        
        if ($complete == false)
        {
            apologize("Sorry, there was a problem marking that task as complete");
        }
            
        // redirect to dashboard
        redirect("index.php");
    }
    else
    {
        // redirect to dashboard
        redirect("index.php");
    }
?>