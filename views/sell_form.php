<form action="sell.php" method="post">
    <fieldset>
        <div class="control-group">
            <select name="stocksymbol">
                <option value="">Select...</option>
                <?php foreach ($stocksymbol as $row): ?>
                <option value="<?= $row['symbol'] ?>"><?= $row['symbol'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="control-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Sell Stock
            </button>
        </div>
    </fieldset>
</form>