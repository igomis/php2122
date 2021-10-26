<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/examples/styles.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<header>
    <h1>
        <?= $greetins.' Visites:' .$visites?><br/>
    </h1>
</header>
<div style="background: aliceblue;margin: 50px" class="w-50 p-3" >
    <form method="POST" action="formulari.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Tìtol:</label>
            <input name="title" type="text" class="form-control <?= isValidClass('title',$errors) ?>" id="title" aria-describedby="titleHelp" placeholder="Enter Title" value="<?= $old_title??'' ?>">
            <small id="titleHelp" class="form-text text-muted">Task's title.</small>
            <?= showError('title',$errors) ?>
        </div>
        <div class="form-group">
            <label for="due">Data d'entrega:</label>
            <input name="due" type="date" class="form-control <?= isValidClass('due',$errors) ?>" id="due" aria-describedby="dueHelp" placeholder="Enter Due" value="<?= $old_due??'' ?>">
            <small id="dueHelp" class="form-text text-muted">Task's due.</small>
            <?= showError('due',$errors) ?>
        </div>
        <div class="form-group">
            <label for="assigned_to">Assignada a:</label>
            <input name="assigned_to" type="text" class="form-control <?= isValidClass('assigned_to',$errors) ?>" id="assigned-to" aria-describedby="assignedHelp" placeholder="Enter person assigned to" value="<?= $old_assigned_to??'' ?>">
            <small id="assignedHelp" class="form-text text-muted">Task's assigned to.</small>
            <?= showError('assigned_to',$errors) ?>
        </div>
        <div class="form-check">
            <input name="completed" type="checkbox" class="form-check-input <?= isValidClass('completed',$errors) ?>" id="completed" <?= (isset($old_completed) && $old_completed=='on')?'checked':'' ?>>
            <label class="form-check-label" for="completed">Completed</label>
            <?= showError('completed',$errors) ?>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>