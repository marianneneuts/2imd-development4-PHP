<?php
    include_once('core/autoload.php');
    
    Project::deleteProject($_GET["projectId"]);
    header("Location: index.php");
    
?>