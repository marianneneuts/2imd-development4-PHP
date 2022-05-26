<?php

include_once(__DIR__ . "/classes/Db.php");
include_once('core/autoload.php');
include_once('logged_in.inc.php');

    $projectId = $_GET['projectId'];
    $userId = $_GET["user"];
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
    <div >

        <h1><?php echo htmlspecialchars($project['title']); ?></h1>
        <p><?php echo htmlspecialchars($project['description']); ?></p>
        <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="">
        <p><?php echo htmlspecialchars($project['tag']); ?></p>
        <p><?php echo htmlspecialchars($project['date']); ?></p>
        <br>
        <br>

        <?php if($_SESSION["userId"] == $_GET["user"]): ?>
        <a href="edit_project.php?projectId=<?php echo $project['id']; ?>">
            <button>Edit project</button>
        </a>
        <?php endif; ?>


    </div>

            


    <!-- delete user project -->
    <a href="delete_project.php?projectId=<?php echo $_GET["projectId"]; ?>" class="deleteProject">Delete project</a>
    
</body>
</html>