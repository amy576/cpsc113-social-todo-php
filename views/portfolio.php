<div>
    Welcome back, <?=$username?>. Your current deposit is $<?=number_format($cash, 2)?>.
</div>
<div>
    <table class = "table table-striped">
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>Shares</th>
                <th>Price</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row)
            {
                print("<tr>");
                print("<td>{$row["symbol"]}</td>");
                print("<td>{$row["name"]}</td>");
                print("<td>{$row["shares"]}</td>");
                print("<td>" . number_format($row["price"], 2) . "</td>");
                print("<td>" . number_format($row["total"], 2) . "</td>");
                print("</tr>");
            }
            ?>
        </tbody>
    </table>
</div>