<!-- when the user is not logged in -->

<?php 
    session_start();
    if(!$_SESSION["loggedIn"]) {
        header("Location: login.php");
    }
?>