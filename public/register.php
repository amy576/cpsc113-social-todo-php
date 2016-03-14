<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if name, email, or password is empty
        if (empty($_POST["name"]))
        {
            apologize("You must provide a name");
        }
        else if (empty($_POST["email"]))
        {
            apologize("You must provide an email");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password");
        }
        else if (strlen($_POST["name"]) > 50)
        {
        apologize("Your name is too long");
        }
        else if (strlen($_POST["email"]) > 50)
        {
        apologize("Your email is too long");
        }
        else if (strlen($_POST["password"]) > 50)
        {
        apologize("Your password is too long");
        }
        
        // if $_POST["password"] does not equal $_POST["confirmation"]
        else if ($_POST["confirmation"] != $_POST["password"])
        {
            apologize("Your passwords do not match");
        }
        
        // check if the user already exists
        $check = CS50::query("INSERT IGNORE INTO users (name, email, password) VALUES(?, ?, ?)", $_POST["name"], $_POST["email"], password_hash($_POST["password"], PASSWORD_DEFAULT));
        
        // query will return 0 if your INSERT fails
        if ($check == 0)
        {
            apologize("Sorry, that user already exists. Please try again");
            
        }
        
        // else, register the user
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            redirect("index.php");
        }
        
    }
    
    // else render form
    else
    {
        render("register_form.php", ["title" => "Register"]);
    }
?>