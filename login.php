<?php
    include_once('core/autoload.php');
    session_start();
    
    // when the user is logged in
    if(isset($_SESSION["loggedIn"])) {
        header("Location: index.php");   
    }

    // when the user can login
    if(isset($_POST["logIn"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (User::canLogin($username, $password)) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
            $_SESSION["userId"] = User::getUserIdByUsername($username);

            header("Location: index.php");
		}
        else {
            $error = "Your username or password is incorrect.";
        }
    }

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IMD Social Showcase</title>
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="split left">
        <img src="https://weareimd.be/assets/images/home_banner.png" alt="weareimd">
    </div>

    <div class="split right">
        <div class="IMDLogin">
            <div class="form-login">
                <form action="" method="post">
                    <h2>Login to [project codename]</h2>
                    <p class="inspiration">Inspiration is everywhere! Just take a look around. 👀</p>

                    <?php if(isset($error)): ?>
                        <div class="form-error">
                            <p><strong>Warnings:</strong></p>
                            <?php if(isset($error)) { echo $error; }?>
                        </div>
                    <?php endif; ?>

                    <div class="form__field">
                        <!-- <label for="Username">Username</label> -->
                        <input autocomplete="off" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form__field">
                        <!-- <label for="Password">Password</label> -->
                        <input type="password" name="password" placeholder="Password">
                    </div>

                    <div class="form__field">
                        <input type="submit" name="logIn" value="Sign in" class="btn-primary">
                    </div>

                    <p class="signup">Don't have an account yet? 🤯 <a href="signup.php" target="_blank">Sign up</a></p>
                    <p class="forgot-password">Forgot your password? <a href="forgot_password.php" target="_blank">Reset your password here</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>