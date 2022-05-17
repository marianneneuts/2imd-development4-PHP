<?php include_once('core/autoload.php'); ?>
<?php include_once('logged_in.inc.php'); ?>

<?php
    $userId = $_GET["user"];
    $avatar = User::getAvatarById($userId);
    $commit = true;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMD Social Showcase</title>
    <link rel="stylesheet" href="css/profile.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once("nav.inc.php"); ?>

    <section class="account_info">
        <div class="account_header">
            <img src="<?php echo($avatar); ?>" alt="avatar">
        </div>

        <?php if($_SESSION["userId"] == $_GET["user"]): ?>
            <a class="edit_profile" href="edit_profile.php"><i class="fa fa-camera" aria-hidden="true" style="color:#fff; background:transparent;"></i></a>
        <?php endif; ?>

        <?php if($_SESSION["userId"] == $_GET["user"]): ?>
            <!-- delete user profile -->
            <a href="delete_profile.php" class="deleteUser">Delete profile</a>
        <?php endif; ?>
    </section>
    
</body>
</html>