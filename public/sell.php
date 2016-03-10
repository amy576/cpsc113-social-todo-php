<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if form is empty
        if (empty($_POST["stocksymbol"]))
        {
            apologize("Please enter the symbol for the stock you wish to sell");
        }
        
        // look up the symbol
        $sell = lookup($_POST["stocksymbol"]);
        
        // check if it was an invalid symbol
        if ($sell === false)
        {
            apologize("The symbol entered is invalid. Please try again");
        }
        
        else
        {
            // check for user's shares of the stock
            $rows = CS50::query("SELECT shares FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["stocksymbol"]));
            if ($rows == 0)
            {
                apologize("Sorry, you do not hold any shares of this stock");
            }
            else
            {
                $shares = $rows[0]["shares"];
            }
            
            $value = $sell["price"] * $shares;
            
            // delete user stocks
            $delete = CS50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["stocksymbol"]));
            if ($delete == false)
            {
                apologize("Sorry, there was a problem selling your shares");
            } 
            
            // find current cash value
            $userinfo = CS50::query("SELECT username, cash FROM users WHERE id = ?", $_SESSION["id"]);
            $cash = $userinfo[0]["cash"];
            
            // new cash value
            $cash += $value;
            
            // update the cash value
            $sold = CS50::query("UPDATE users SET cash = ? WHERE id = ?", $cash, $_SESSION["id"]);
            if ($sold == false)
            {
                apologize("Sorry, there was a problem selling your shares");
            }
            
            // log in history database
            $log = CS50::query("INSERT INTO history(user_id, transaction_type, symbol, shares, price, date) VALUES (?, ?, ?, ?, ?, NOW())"             ,$_SESSION["id"], "sold", strtoupper($_POST["stocksymbol"]), $shares, $sell["price"]);
            
            // redirect to portfolio
            redirect("index.php");
        }
    }
        
    // if form has not been submitted, display which stocks the user has shares in
    else
    {
        $stocksymbol = CS50::query("SELECT symbol FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
        render("sell_form.php", ["title" => "Sell", "stocksymbol" => $stocksymbol]);
    }
?>