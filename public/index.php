<?php

    // configuration
    require("../includes/config.php"); 

    // checks portfolios and users database for what we need
    $rows = CS50::query("SELECT symbol, shares FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
    {
        // queries Yahoo Finance
        $stock = lookup($row["symbol"]);
        
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "total" => $row["shares"]*$stock["price"]
            ];
        }
    }

    // checks users database for cash
    $userinfo = CS50::query("SELECT username, cash FROM users WHERE id = ?", $_SESSION["id"]);
    $cash = $userinfo[0]["cash"];
    $username = $userinfo[0]["username"];
    
    // render portfolio
    render("portfolio.php", ["rows" => $positions, "title" => "Portfolio", "username" => $username, "cash" => $cash]);

?>
