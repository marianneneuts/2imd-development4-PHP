<?php

    //include_once(__DIR__ . "/classes/Db.php");
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

        public function updateProject($title, $tag){
            $conn = Db::getInstance();
            $statement = $conn->prepare("update projects set projects.title = :title, projects.tag = :tag where id = :projectId");
            $statement->bindValue(":projectId", $this->projectId);
            $statement->bindValue(":title", $title);
            $statement->bindValue(":tag", $tag);
            $result = $statement->execute();
            return $result;
        }

        public static function getAll() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from projects");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getProjectById($id) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from projects where id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        // delete user project
        public static function deleteProject($projectId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("delete from projects where id = :projectId");
            $statement->bindValue(":projectId", $projectId);
            $statement->execute();
        }
    }