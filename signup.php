<?php include_once('core/autoload.php'); ?>

<?php
    if(!empty($_POST)) {
        try {
            $user = new User();
            $user->setUsername($_POST["username"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->signup();

            session_start();
            header("Location: login.php");
        }
        catch(Throwable $error) {
            $error = $error->getMessage();
        }
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>[project codename]</title>
    <link rel="stylesheet" href="css/signup.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="split left">
        <img src="https://weareimd.be/assets/images/home_banner.png" alt="weareimd">
    </div>

    <div class="split right">
        <div class="IMDSignup">
            <div class="form-signup">
                <form action="" method="post">
                    <h2>Sign up to [project codename]</h2>
                    <p class="inspiration">Inspiration is everywhere! Just take a look around. 👀</p>

                    <?php if(isset($error)): ?>
                        <div class="form-error">
                            <p><strong>Warnings:</strong></p>
                            <?php if(isset($error)) { echo $error; }?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form__field">
                        <!-- <label for="Username">Username</label> -->
                        <input autocomplete="off" type="text" id="username" name="username" placeholder="Username">

                        <!-- username response -->
                        <div id="username_response"></div>
                    </div>

                    <div class="form__field">
                        <!-- <label for="Email">Email</label> -->
                        <input autocomplete="on" type="text" name="email" placeholder="Email">
                    </div>

                    <div class="form__field">
                        <!-- <label for="Password">Password</label> -->
                        <input type="password" name="password" placeholder="Password">
                    </div>

                    <div class="form__field">
                        <input type="submit" value="Sign up" class="btn-primary">
                    </div>

                    <p class="login"><strong>Already have an account? 🥳</strong> <a href="login.php" target="_blank">Log in</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>