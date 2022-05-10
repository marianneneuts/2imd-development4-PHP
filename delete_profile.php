<?php
    include_once('core/autoload.php');
    session_start();
    session_destroy();

    User::deleteProfile();
    header("Location: signup.php");
?>