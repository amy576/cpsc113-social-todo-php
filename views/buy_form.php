<form action="buy.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autocomplete="off" autofocus class="form-control" name="stocksymbol" placeholder="Stock symbol" type="text"/>
        </div>
        <div class="control-group">
            <input autocomplete="off" autofocus class="form-control" name="shares" placeholder="Number of shares" type="text"/>
        </div>
        <div class="control-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Buy Stock
            </button>
        </div>
    </fieldset>
</form>