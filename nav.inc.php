<nav class="main-nav">

    <!-- logo -->

    <div class="nav__menu">
        <a href="index.php" class="main-nav__link">Home</a>
        <a href="profile.php?user=<?php echo($_SESSION['userId']) ?>" class="main-nav__link">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>