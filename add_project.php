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
            echo "File is set";
            $currentDirectory = getcwd();
            $uploadDirectory = "/project_pictures/";
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSaveQuality = 80;
            $uploadPath = $currentDirectory . $uploadDirectory . $fileName;
            move_uploaded_file($fileTmpName, $uploadPath);
            $project->setImage("project_pictures/" .$fileName);
        } else {
            echo "File is not set";
            $project->setImage("project_pictures/default.png");
        }

        $project->setTag($_POST['tag']);
        $project->save();
        header("Location: index.php");
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
    <h1 class="ms-3">Add another project to your profile</h1>

    <form class="ms-4" action="" method="post" enctype="multipart/form-data">
        <div class="mt-4">
            <label for="title">Title</label><br>
            <input class="rounded" type="text" name="title" id="title">
        </div>

        <div class="mt-2">
            <label for="description">Description</label><br>
            <input class="rounded" type="text" name="description" id="description">
        </div>

        <div class="mt-2">
            <label for="image">Image</label><br>
            <input type="file" name="file" value="" >
        </div>

        <div class="mt-2">
            <label for="tag">Tag</label><br>
            <input class="rounded" type="text" name="tag" id="tag">
        </div>

        <div class="">
            <input class="btn btn-primary mt-3" type="submit" name="submit" value="Submit">
        </div>
        
    </form>
    
</body>
</html>