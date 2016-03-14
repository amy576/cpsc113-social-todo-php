<form action="addtask.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autocomplete="off" autofocus class="form-control" name="title" placeholder="Title" type="text"/>
        </div>
        <div class="control-group">
            <input autocomplete="off" autofocus class="form-control" name="description" placeholder="Description" type="text"/>
        </div>
        <div class="control-group">
            <input autocomplete="off" autofocus class="form-control" name="collaborator_1" placeholder="Collaborator" type="text"/>
        </div>
        <div class="control-group">
            <input autocomplete="off" autofocus class="form-control" name="collaborator_2" placeholder="Collaborator" type="text"/>
        </div>
        <div class="control-group">
            <input autocomplete="off" autofocus class="form-control" name="collaborator_3" placeholder="Collaborator" type="text"/>
        </div>
        <div class="control-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Add Task
            </button>
        </div>
    </fieldset>
</form>