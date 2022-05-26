<?php

    include_once(__DIR__ . "/classes/Db.php");
    include_once('core/autoload.php');
    $projectId = $_GET['projectId'];

    // update title and tag
    if(isset($_POST['submit'])){
        $project = new Project();
        $project->updateProject($_POST['title'], $_POST['tag'], $projectId);
        header("Location: project.php?projectId=$projectId");
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMD Social Showcase</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    <h1 class="ms-3">Edit this project</h1>

    <form class="ms-4" action="" method="post">
        <div class="mt-3">
            <label for="title">Edit title</label> <br>
            <input class="rounded" type="text" name="title" id="title">
        </div>

        <div class="mt-3">
            <label for="tag">Edit tag</label><br>
            <input class="rounded" type="text" name="tag" id="tag">
        </div>

        <input class="btn btn-primary mt-3" type="submit" name="submit" value="Submit">
    </form>

        
    
</body>
</html>