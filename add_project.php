<?php

    include_once(__DIR__ . "/classes/Db.php");
    include_once('core/autoload.php');
    session_start();
    
    

    
    class Project{
        private $projectId;
        private $userId;
        private $title;
        private $description;
        private $image;
        private $tag;
        private $date;

        public function getProjectId() {
            return $this->projectId;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getImage() {
            return $this->image;
        }

        public function getTag() {
            return $this->tag;
        }

        public function getDate() {
            return $this->date;
        }

        public function setProjectId($projectId) {
            $this->projectId = $projectId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
        }

        public function setTitle($title) {
            $this->title = $title;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function setTag($tag) {
            $this->tag = $tag;
        }

        public function setDate() {
            $date = new DateTime();
            $this->date = $date->format('Y-m-d H:i:s');
        }

        public function save(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into projects (userId, title, description, image, tag, date) values (:userId, :title, :description, :image, :tag, :date)");
            $statement->bindValue(":userId", $this->userId);
            $statement->bindValue(":title", $this->title);
            $statement->bindValue(":description", $this->description);
            $statement->bindValue(":image", $this->image);
            $statement->bindValue(":tag", $this->tag);
            $statement->bindValue(":date", $this->date);
            $statement->execute();
        }
    }

    if(!empty($_POST)){
        $project = new Project();
        if(isset($_SESSION['userId'])){
            $project->setUserId($_SESSION['userId']);
        } else {
            $project->setUserId(1);
        }
        $project->setTitle($_POST['title']);
        $project->setDescription($_POST['description']);
        $project->setImage($_POST['image']);
        $project->setTag($_POST['tag']);
        //$project->setDate($_POST['date']);
        $project->save();
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
            <input type="file" name="image" id="image">
        </div>

        <div>
            <label for="tag">Tag</label>
            <input type="text" name="tag" id="tag">
        </div>

        <div>
            <input type="submit" name="submitbutton" value="Submit">
        </div>
        
    </form>
    
</body>
</html>