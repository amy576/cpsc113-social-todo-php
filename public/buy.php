<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if form is empty
        if (empty($_POST["stocksymbol"]))
        {
            apologize("Please enter the symbol for the stock you wish to buy");
        }
        if (empty($_POST["shares"]))
        {
            apologize("Please enter a number of shares to buy");
        }
        
        // validate number of shares
        if (!is_numeric($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]))
        {
            apologize("Please enter an integer of shares to buy");
        }
        
        // look up the symbol
        $buy = lookup($_POST["stocksymbol"]);
        
        // check if it was an invalid symbol
        if ($buy === false)
        {
            apologize("The symbol entered is invalid. Please try again");
        }
        
        else
        {
            // find current cash value
            $userinfo = CS50::query("SELECT username, cash FROM users WHERE id = ?", $_SESSION["id"]);
            $cash = $userinfo[0]["cash"];
            
            // find the current value
            $price = $buy["price"] * $_POST["shares"];
            
            // check if there is sufficient funds to buy
            if ($cash < $price)
            {
                apologize("You do not have enough money to buy this many shares of this stock");
            }
            
            // buy the stock
            else
            {
                // insert into database
                $insert = CS50::query("INSERT INTO portfolios(user_id, symbol, shares) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], strtoupper($buy["symbol"]), $_POST["shares"]);
                if ($insert == false)
                {
                    apologize("Sorry, there was a problem buying your shares");
                }
                
                // update user's cash value
                $update = CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $price, $_SESSION["id"]);
                if ($update == false)
                {
                    apologize("Sorry, there was a problem buying your shares");
                }
                
                $cash -= $price;
                
                // log in history database
                $log = CS50::query("INSERT INTO history(user_id, transaction_type, symbol, shares, price, date) VALUES (?, ?, ?, ?, ?, NOW())", $_SESSION["id"], "bought", strtoupper($buy["symbol"]), $_POST["shares"], $buy["price"]);
                
                // redirect to portfolio
                redirect("index.php");
            }
        }
    }
    else
    {
        // render form
        render("buy_form.php", ["title" => "Buy"]);
    }
?>