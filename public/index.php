<?php

    // configuration
    require("../includes/config.php"); 

    // checks users database for what we need
    $userinfo = CS50::query("SELECT name, email FROM users WHERE id = ?", $_SESSION["id"]);
    
    // checks tasks database for tasks
    $rows = CS50::query("SELECT id, title, description, is_complete FROM tasks WHERE owner_id = ? OR collaborator_1 = ? OR collaborator_2 = ? OR collaborator_3 = ?", $_SESSION["id"], $userinfo[0]["email"], $userinfo[0]["email"], $userinfo[0]["email"]);
    $positions = [];
    
    foreach ($rows as $row)
    {
        $positions[] = [
                "task_id" => $row["id"],
                "task_title" => $row["title"],
                "description" => $row["description"],
                "is_complete" => $row["is_complete"]
            ];
    }

    // checks users database for name
    $name = $userinfo[0]["name"];
    
    // render dashboard
    render("dashboard.php", ["rows" => $positions, "title" => "Dashboard", "name" => $name]);

?>
