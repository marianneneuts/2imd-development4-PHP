<?php include_once('core/autoload.php'); ?>

<?php
    if(!empty($_POST)) {
        try {
            $user = new User();
            $user->setUsername($_POST["username"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $userId = $user->signup();

            session_start();
            $_SESSION["userId"] = intval($userId);
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
    <script src="jquery-3.4.1.min.js" type="text/javascript"></script>
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
                        <input autocomplete="on" type="text" id="email" name="email" placeholder="Email">

                        <!-- email response -->
                        <div id="email_response"></div>
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

<script type="text/javascript" src="js/username_exists.js"></script>
<script type="text/javascript" src="js/email_exists.js"></script>
</body>
</html>