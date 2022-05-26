<?php

include_once(__DIR__ . "/classes/Db.php");
include_once('core/autoload.php');
    $projectId = $_GET['projectID'];
    echo $projectId;
//vergelijken userid uit session met userid van project 
    $project = Project::getProjectById($projectId);
    

    var_dump($project);


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>