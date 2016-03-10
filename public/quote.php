<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if form is empty
        if (empty($_POST["stocksymbol"]))
        {
            apologize("Please enter the symbol for the stock you wish to look up");
        }
        
        // look up the symbol
        $quote = lookup($_POST["stocksymbol"]);
        
        // check if it was an invalid symbol
        if ($quote === false)
        {
            apologize("The symbol entered is invalid. Please try again");
        }
        
        else
        {
            // render the result form
            render("quote_result.php", ["title" => "Quote", "stocksymbol" => $quote["symbol"], "name" => $quote["name"], "price" => $quote["price"]]);
        }
        
    }
    
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Get Quote"]);
    }

?>