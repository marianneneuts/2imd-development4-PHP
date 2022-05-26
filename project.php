<?php

include_once(__DIR__ . "/classes/Db.php");
include_once('core/autoload.php');
include_once('logged_in.inc.php');

    $projectId = $_GET['projectID'];
    echo $projectId;
//vergelijken userid uit session met userid van project 
    $project = Project::getProjectById($projectId);
    

    var_dump($project);


    $projectId = $_GET['projectId'];

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

    <!-- delete user project -->
    <a href="delete_project.php?projectId=<?php echo $_GET["projectId"]; ?>" class="deleteProject">Delete project</a>
    
</body>
</html>