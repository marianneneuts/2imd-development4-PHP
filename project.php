<?php

include_once(__DIR__ . "/classes/Db.php");
include_once('core/autoload.php');
include_once('logged_in.inc.php');

    $projectId = $_GET['projectId'];
    //vergelijken userid uit session met userid van project 
    $project = Project::getProjectById($projectId);

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
    <div class="ms-3 bg-light rounded">

        <h1 class="ps-4 pt-4"><?php echo htmlspecialchars($project['title']); ?></h1>
        <img class="w-25 ms-4 mt-3 " src="<?php echo htmlspecialchars($project['image']); ?>" alt="">
        <h5 class="ps-3 fw-bold pt-3">Description</h5>
        <p class="ps-4"><?php echo htmlspecialchars($project['description']); ?></p>
        <h5 class=" ps-3 fw-bold">Tag</h5>
        <p class="ps-4"><?php echo htmlspecialchars($project['tag']); ?></p>
        <h5 class=" ps-3 fw-bold">Posted on</h5>
        <p class="ps-4"><?php echo htmlspecialchars($project['date']); ?></p>

        <div class="ps-3 ">
            <a class="btn btn-secondary mb-3" href="edit_project.php?projectId=<?php echo $project['id']; ?>">Edit project</a>

            <!-- delete user project -->
            <a class="btn btn-danger mb-3 ms-3" href="delete_project.php?projectId=<?php echo $_GET["projectId"]; ?>" class="deleteProject">Delete project</a>

        </div>
        
    </div>

            


    
    
</body>
</html>