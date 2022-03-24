<?php
    include_once(__DIR__ . "/Db.php");

    class User {
        private $username;
        private $email;
        private $password;

        // username
        public function setUsername($username) {
            // the user must enter a valid username
            if(empty($username)) {
                throw new Exception("Please enter a valid username.");
            }
            $this->username = $username;
        }

        public function getUsername() {
            return $this->username;
        }

        // email
        public function setEmail($email) {
            // validation to check if email address contains @student.thomasmore.be or @thomasmore.be
            if (!strpos($email, '@student.thomasmore.be')) {
                if (!strpos($email, '@thomasmore.be')) {
                    throw new Exception("Enter your Thomas More email address.");
                }
            }
            $this->email = $email;
        }

        public function getEmail() {
            return $this->email;
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