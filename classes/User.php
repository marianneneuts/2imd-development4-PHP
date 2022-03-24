<?php
    include_once(__DIR__ . "/Db.php");

    class User {
        private $username;
        private $email;
        private $password;

        // username
        public function setUsername($username) {
        
        }

        public function getUsername() {

        }

        // email
        public function setEmail($email) {

        }

        public function getEmail() {
        
        }

        // password
        public function setPassword($password) {

        }

        public function getPassword() {

        }

        public function signup() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");

            $username = $this->getUsername();
            $email = $this->getEmail();
            $password = $this->getPassword();

            $statement->bindValue("username", $username);
            $statement->bindValue("email", $email);
            $statement->bindValue("password", $password);
            $result = $statement->execute();
            return $result;
        }
    }