<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by submitting a form via GET)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // set is_complete to 0 (false, a.k.a. no it is not complete)
        $incomplete = CS50::query("UPDATE tasks SET is_complete=0 WHERE id = ?", $_GET['toggle-task']);
        
        if ($incomplete == false)
        {
            apologize("Sorry, there was a problem marking that task as incomplete");
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