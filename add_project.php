<?php

    include_once(__DIR__ . "/classes/Db.php");
    
    class Project {
        private $projectId;
        private $title;
        private $description;
        private $image;
        //private $date;
        private $tag;

        //projectId

        public function setProjectId($projectId){
            $this->projectId = $projectId;
        }

        public function getProjectId(){
            return $this->projectId;
        }

        //title

        public function setTitle($title){
            $this->title = $title;
        }

        public function getTitle(){
            return $this->title;
        }

        //description

        public function setDescription($description){
            $this->description = $description;
        }

        public function getDescription(){
            return $this->description;
        }

        //image

        public function setImage($image){
            $this->image = $image;
        }

        public function getImage(){
            return $this->image;
        }

        //tag

        public function setTag($tag){
            $this->tag = $tag;
        }

        public function getTag(){
            return $this->tag;
        }



        public function addProject() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into projects (title, description, image, tag) values (:title, :description, :image, :tag)");
            $statement->bindValue(":title", $this->title);
            $statement->bindValue(":description", $this->description);
            $statement->bindValue(":image", $this->image);
            $statement->bindValue(":tag", $this->tag);
            $result = $statement->execute();
            return $result;
        }

    }

    if(!empty($_POST)) {
        try {
            $project = new Project();
            $project->setTitle($_POST["title"]);
            $project->setDescription($_POST["description"]);
            $project->setImage($_POST["image"]);
            $project->setTag($_POST["tag"]);
            $project->addProject();

            session_start();
            //header("Location: login.php");
        }
        catch(Throwable $error) {
            $error = $error->getMessage();
        }
    }



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