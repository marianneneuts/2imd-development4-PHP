<?php



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add another project to your profile</h1>

    <form action="" method="post">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description">
        </div>

        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image">
        </div>

        <div>
            <label for="tag">Tag</label>
            <input type="text" name="tag" id="tag">
        </div>

        <div>
            <input type="submit" value="Submit">
        </div>
        


    </form>
    
</body>
</html>