<?php
    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        
        // if deposit amount is invalid (not a whole positive integer)
        if (preg_match("/^\d+$/", $_POST["deposit"]) == false)
        {
            apologize("That was not a positive integer amount. Please try again");
        }
        
        // update user's cash
        $update = CS50:: query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["deposit"], $_SESSION["id"]);
        
        // log in history database
        $log = CS50::query("INSERT INTO history(user_id, transaction_type, price, date) VALUES (?, ?, ?, NOW())", $_SESSION["id"], "deposit", $_POST["deposit"]);
        
        // redirect to portfolio 
        redirect("index.php");
    }
    
    else
    {
        // render form
        render("deposit_form.php", ["title" => "Deposit"]);
    }
?>