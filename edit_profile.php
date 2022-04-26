<?php include_once('core/autoload.php'); ?>
<?php include_once('logged_in.inc.php'); ?>

<?php
    $userId = $_SESSION['userId'];
    $avatar = User::getAvatarById($userId);

    $user = new User();
    if(isset($_POST['update_avatar'])) {
        $currentDirectory = getcwd();
        $uploadDirectory = "/profile_pictures/";
    
        // replace image on the same path in user_profilepictures
        $fileName = $userId."_avatar.jpg";
        $fileTmpName = $_FILES['upload_avatar']['tmp_name'];
    
        $fileSaveQuality = 80; 
    
        $uploadPath = $currentDirectory . $uploadDirectory . $fileName; 
        move_uploaded_file($fileTmpName, $uploadPath);
    
        $picture = "profile_pictures/" .$fileName;
        $user->updateAvatar($userId, $picture);
        header('location: profile.php?user=' . $_SESSION['userId']);
    }

    if(isset($_POST['delete_avatar'])) {
        $picture = "profile_pictures/default.png";
        $user->updateAvatar($userId, $picture);
        header('location: profile.php?user=' . $_SESSION['userId']);
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMD Social Showcase</title>
    <link rel="stylesheet" href="css/profile.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once("nav.inc.php"); ?>

    <form action="#" method="post" enctype="multipart/form-data">
        <div class="edit_avatar">
            <img src="<?php echo($avatar); ?>" alt="avatar">
            
            
            <div class="btn-submit">
                <!-- upload file -->
            <input type="file" name="upload_avatar" value="Upload avatar" class="upload_avatar" accept="image/png, image/jpeg">
                <!-- update avatar -->
                <input type="submit" name="update_avatar" value="Update avatar" class="btn-update">

                <!-- delete avatar -->
                <input type="submit" name="delete_avatar" value="Delete avatar" class="btn-delete">

                <!-- cancel -->
                <a href="profile.php?user=<?php echo($_SESSION['userId']) ?>">Cancel</a>
            </div>
        </div>
    </form>
    
</body>
</html>