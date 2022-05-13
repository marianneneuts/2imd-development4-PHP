<?php include_once('core/autoload.php'); ?>
<?php include_once('logged_in.inc.php'); ?>

<!DOCTYPE html>
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
    
    <a href="add_project.php">
        <button>Add project</button> <!-- add css to button -->
    </a>

    <div class="card" style="width: 18rem;">
        <img src="https://dontgetserious.com/wp-content/uploads/2021/11/everything-is-fine-memes.jpeg" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    
</body>
</html>