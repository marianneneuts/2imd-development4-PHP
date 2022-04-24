<?php

    include_once(__DIR__ . "/classes/Db.php");
    include_once('core/autoload.php');
    
    if($_POST) {
        try {
            $project = new Project();
            $project->setTitle($_POST["title"]);
            $project->setDescription($_POST["description"]);
            $project->setImage($_POST["image"]);
            $project->setTag($_POST["tag"]);
            $project->setDate($_POST["date"]);
            $project->addProject();
            header("Location: index.php");
        }
        catch(Throwable $error) {
            $error = $error->getMessage();
        }
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add another project to your profile</h1>

    <form action="" method="post">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description">
        </div>

        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <label for="tag">Tag</label>
            <input type="text" name="tag" id="tag">
        </div>

        <div>
            <input type="submit" name="submitbutton" value="Submit">
        </div>
        
    </form>
    
</body>
</html>