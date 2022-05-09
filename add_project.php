<?php

    include_once(__DIR__ . "/classes/Db.php");
    include_once('core/autoload.php');

    if(!empty($_POST)){
        $project = new Project();
        if(isset($_SESSION['userId'])){
            $project->setUserId($_SESSION['userId']);
        } else {
            $project->setUserId(1);
        }
        $project->setTitle($_POST['title']);
        $project->setDescription($_POST['description']);
        //$project->setImage($_POST['file']);

        if(isset($_FILES['file'])) {
            $currentDirectory = getcwd();
            $uploadDirectory = "/project_pictures/";
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSaveQuality = 80;
            $uploadPath = $currentDirectory . $uploadDirectory . $fileName;
            move_uploaded_file($fileTmpName, $uploadPath);
            $project->setImage($_POST["project_pictures/" .$fileName]);
        } else {
            $project->setImage("project_pictures/default.png");
        }

        $project->setTag($_POST['tag']);
        $project->save();
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
            <input type="file" name="file" >
        </div>

        <div>
            <label for="tag">Tag</label>
            <input type="text" name="tag" id="tag">
        </div>

        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
        
    </form>
    
</body>
</html>