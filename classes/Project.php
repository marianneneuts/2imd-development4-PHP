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
    }