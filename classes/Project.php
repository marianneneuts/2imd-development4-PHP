<?php

class Project{
    private $projectId;
    private $userId;
    private $title;
    private $description;
    private $image;
    private $tag;
    private $date;

    // id
    public function setProjectId($projectId){
        $this->projectId = $projectId;
    }

    public function getProjectId(){
        return $this->projectId;
    }

    // user id
    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function getUserId(){
        return $this->userId;
    }

    // title
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    // description
    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    // image
    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }

    // tag
    public function setTag($tag) {
        $this->tag = $tag;
    }

    public function getTag() {
        return $this->tag;
    }

    // date
    public function setDate($date) {
        $this->date = $date;
    }

    public function getDate() {
        return $this->date;
    }

    // add project
    public function addProject() {
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into projects (title, description, image, tag, date) values (:title, :description, :image, :tag, :date)");
        $statement->bindValue(":title", $this->title);
        //$statement->bindValue(":userId", $this->userId);
        $statement->bindValue(":description", $this->description);
        $statement->bindValue(":image", $this->image);
        $statement->bindValue(":tag", $this->tag);
        $statement->bindValue(":date", $this->date);
        $statement->execute();
    }

    

    /*
    // get all projects
    public static function getAllProjects() {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from projects");
        $statement->execute();
        $projects = $statement->fetchAll();
        return $projects;
    }

    // get project by id
    public static function getProjectById($id) {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from projects where id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $project = $statement->fetch();
        return $project;
    }

    // get project by tag
    public static function getProjectsByTag($tag) {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from projects where tag = :tag");
        $statement->bindValue(":tag", $tag);
        $statement->execute();
        $projects = $statement->fetchAll();
        return $projects;
    }

    // get project by date
    public static function getProjectsByDate($date) {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from projects where date = :date");
        $statement->bindValue(":date", $date);
        $statement->execute();
        $projects = $statement->fetchAll();
        return $projects;
    }

    // get project by title
    public static function getProjectsByTitle($title) {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from projects where title = :title");
        $statement->bindValue(":title", $title);
        $statement->execute();
        $projects = $statement->fetchAll();
        return $projects;
    }*/

}