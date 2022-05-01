<?php include_once('core/autoload.php'); ?>
<?php include_once('logged_in.inc.php'); ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$userId = $_SESSION['userId'];
$password = User::changePassword($userId, $password, $newPassword);

$user = new User();
if(isset($_POST["change_password"])) {
    //er is verzonden
    $password = $_POST["password"];
    $newPassword = $_POST("newPassword");
    
    if ($password['password'] !== "" && $newPassword['newPassword']) {
            if($user->changePassword($userId)) {
              $success = "Your new password update successfully.";
            }else{
              $error = "Old Password is not match";
            }
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    </div>
		<div class="form__field">
			<label for="password">Old password</label>
			<input type="password" name="password">
		</div>

        <div class="form__field">
			<label for="newPassword">New password</label>
			<input type="password" name="newPassword">
		</div>

		<div class="form__field">
			<input type="submit" name="change_password" value="Change password!" class="btn-primary">	
	</div>

</body>
</html>