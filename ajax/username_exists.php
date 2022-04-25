<?php include_once('../core/autoload.php'); ?>

<?php
    if(isset($_POST['username'])) {
        $username = $_POST['username'];

        // does the username already exist
        User::usernameExists($username);
    }

?>