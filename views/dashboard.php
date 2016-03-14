<div>
    Welcome back, <?=$name?>. Let's get shit done.
</div>
<div>
    <!--<form action="changetask.php" method="post">-->
    <!--    <fieldset>-->
    <table class = "table table-striped">
        <thead>
            <tr>
                <th>Complete?</th>
                <th>Title</th>
                <th>Description</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row)
            {
                print("<tr>");
                
                // checked box and strikethrough text if complete (is_complete == true == 1)
                if ($row["is_complete"] == 1)
                {
                    print("<td><form action='incompletetask.php' class='toggle-task' method='GET'><button type='submit' class='toggle-task' name='toggle-task' value={$row["task_id"]}>Mark as Incomplete</button></form></td>");
                    print("<td><strike>{$row["task_title"]}</strike></td>");
                }
                
                // if not complete (is_complete == false == 0), unchecked box
                else
                {
                    print("<td><form action='completetask.php' class='toggle-task' method='GET'><button type='submit' class='toggle-task' name='toggle-task' value={$row["task_id"]}>Mark as Complete</button></form></td>");
                    print("<td>{$row["task_title"]}</td>");
                }

                print("<td>{$row["description"]}</td>");
                print("<td><form action='deletetask.php' class='delete-task' method='GET'><button type='submit' class='delete-task' name='delete-task' value={$row["task_id"]}>DELETE</button></form></td>");
                print("</tr>");
            }
            ?>
        </tbody>
    </table>
</div>