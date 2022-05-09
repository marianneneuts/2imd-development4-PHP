<?php include_once('core/autoload.php'); ?>
<?php include_once('logged_in.inc.php'); ?>
<?php var_dump($_SESSION); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMD Social Showcase</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    
    <a href="add_project.php">
        <button>Add project</button> <!-- add css to button -->
    </a>
    
</body>
</html>