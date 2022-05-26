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
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    <h1>Edit this project</h1>

    <form action="" method="post">
        <div>
            <label for="title">Edit title</label> <br>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="tag">Edit tag</label><br>
            <input type="text" name="tag" id="tag">
        </div>

        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>

        
    
</body>
</html>