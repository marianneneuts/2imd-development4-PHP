<?php

        include_once(__DIR__ . '/../core/autoload.php');

        class Comment{
                private $commentId;
                private $text;
                private $projectId;
                private $userId;

                public function getCommentId() {
                    return $this->commentId;
                }

                public function getText() {
                    return $this->text;
                }

                public function getProjectId() {
                    return $this->projectId;
                }

                public function getUserId() {
                    return $this->userId;
                }

                public function setCommentId($commentId) {
                    $this->commentId = $commentId;
                }

                public function setText($text) {
                    $this->text = $text;
                }

                public function setProjectId($projectId) {
                    $this->projectId = $projectId;
                }

                public function setUserId($userId) {
                    $this->userId = $userId;
                }

                public function saveComment(){
                        $conn = Db::getInstance();
                        $statement = $conn->prepare("insert into comments (text, projectId, userId) values (:text, :projectId, :userId)");
                        $statement->bindValue(":text", $this->text);
                        $statement->bindValue(":projectId", $this->projectId);
                        $statement->bindValue(":userId", $this->userId);
                        return $statement->execute();
                }


                public static function getAllComments($projectId){
                        $conn = Db::getInstance();
                        $statement = $conn->prepare("select * from comments where projectId = :projectId");
                        $statement->bindValue(":projectId", $projectId);
                        $statement->execute();
                        $result = $statement->fetchAll();
                        return $result;
                }
        }