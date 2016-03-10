<?php

    // configuration
    require("../includes/config.php"); 

    // checks history database for data
    $rows = CS50::query("SELECT * FROM history WHERE user_id = ? order by date desc", $_SESSION["id"]);
    
    if (count($rows) == 0)
    {
        apologize("You have not made any transactions yet!");
    }
    
    // pulling out variables
    $history = [];
    foreach ($rows as $row)
    {
        $history[] = [
                "transaction_type" => $row["transaction_type"],
                "price" => $row["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "date" => $row["date"],
                "total" => $row["shares"]*$row["price"]
        ];
    }
    
    // checks users database for cash
    $userinfo = CS50::query("SELECT username, cash FROM users WHERE id = ?", $_SESSION["id"]);
    $cash = $userinfo[0]["cash"];
    $username = $userinfo[0]["username"];
    
    // render history_results.php
    render("history_results.php", ["rows" => $history, "title" => "History", "username" => $username, "cash" => $cash, "history" => $history]);
    
?>