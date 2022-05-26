<?php 
    include_once('core/autoload.php');
    include_once('logged_in.inc.php'); // session_start() staat in loggin_in, nodig voor user id

    $projects = Project::getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMD Social Showcase</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    
    <a class="btn btn-primary ms-3" href="add_project.php">Add project</a>

    <br>

    <?php if(empty($projects)): ?>
        <h1 id="noProjects">Nothing to see here!</h1>
    <?php endif; ?>

    <?php if(!empty($projects)): ?>
        <div class="d-flex container-fluid gap-4 mt-4">
            <?php foreach($projects as $p): ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo htmlspecialchars($p['image']); ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <div class="wrapper">
                        <img src="<?php echo($p['profile_picture'])?>" class="card-avatar" alt="">
                        <h5 class="card-user"><?php echo("<a href='profile.php?user=". $p["userId"] ."'> ". htmlspecialchars($p["username"]) ." </a>")?></h5>
                    </div>
                    <br>
                    <h5 class="card-title"><?php echo htmlspecialchars($p['title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($p['description']); ?></p>
                    <a href="project.php?projectId=<?php echo $p["id"]; ?>" class="btn btn-info">View details</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
</body>
</html>