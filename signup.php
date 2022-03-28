<?php
    if(!empty($_POST)) {
        try {
            include_once(__DIR__ . "/classes/User.php");

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repeatPassword = $_POST['repeatPassword'];

            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);

            if($user->canSignup($password, $repeatPassword)) {
                session_start();
                $user->signup();
                header("Location: login.php");
            }
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
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
	<div class="IMDSignup">
        <div class="form-signup">
            <form action="" method="post">
                <h2>Sign up to [project codename]</h2>
                <p>Inspiration is everywhere! Just take a look around. 👀</p>

                <?php if(isset($error)): ?>
                    <div class="form-error">
                        <p><strong>Warnings:</strong></p>
                        <?php if(isset($error)) { echo $error; }?>
                    </div>
                <?php endif; ?>
                
                <div class="form__field">
                    <label for="Username">Username</label>
                    <input autocomplete="off" type="text" name="username">
                </div>

                <div class="form__field">
                    <label for="Email">Email</label>
                    <input autocomplete="on" type="text" name="email">
                </div>

                <div class="form__field">
                    <label for="Password">Password</label>
                    <input type="password" name="password">
                </div>

                <div class="form__field">
                    <label for="Password">Repeat password</label>
                    <input type="password" name="repeatPassword">
                </div>

                <div class="form__field">
                    <input type="submit" value="Sign up" class="btn-primary">
                </div>

                <p>Already have an account? 🥳 <a href="login.php" target="_blank">Log in</a></p>
            </form>
        </div>
	</div>
</body>
</html>