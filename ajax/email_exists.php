<?php include_once('../core/autoload.php'); ?>

<?php
    if(isset($_POST['email'])) {
        $email = $_POST['email'];

        // does the email already exist
        User::emailExists($email);
    }

?>