<?php
    include_once(__DIR__ . "/Db.php");

    class User {
        private $userId;
        private $username;
        private $email;
        private $password;

        // id
        public function setUserId($userId){
            $this->userId = $userId;
        }

        public function getUserId(){
            return $this->userId;
        }

        // username
        public function setUsername($username) {
            self::checkUsername($username);

            $this->username = $username;
        }

        public function getUsername() {
            return $this->username;
        }

        // username check
        public function checkUsername($username) {
            if($username === "") {
                throw new Exception("Please enter a valid username.");
            }

            if(strpos($username, " ")) {
                throw new Exception("The username cannot contain blank spaces.");
            }

            if($this->usernameExistsAlready($username)) {
                throw new Exception("This username is already taken.");
            }
        }

        // does the username already exist
        public static function usernameExists($username){ 
            $conn = Db::getInstance();
            $statement = $conn->prepare("select count(*) as count from users where username = :username");
            $statement->bindValue(":username", $username);     
            $statement->execute();
            $count = $statement->fetchColumn();

            $response = "<span style='color: #bffd00;'>Username is available.</span>";

            if($count > 0) {
                $response = "<span style='color: #fcd7f7;'>Username is not available.</span>";
            }
         
            echo $response;
            exit;
        }
        
        // what if the username already exists
        private function usernameExistsAlready($username){ 
            $conn = Db::getInstance();
            $statement = $conn->prepare("select id from users where username = :username");
            $statement->bindValue(":username", $username);            
            $statement->execute();
            $result = $statement->fetch();

            if(!$result){
                return false;
            } 
            else {
                return true;
            }
        }

        // email
        public function setEmail($email) {
            self::checkEmail($email);

            $this->email = $email;
        }

        public function getEmail() {
            return $this->email;
        }

        // email check
        public function checkEmail($email) {
            if(empty($email)) {
                throw new Exception("Please enter a valid email address.");
            }

            if (!strpos($email, '@student.thomasmore.be')) {
                if (!strpos($email, '@thomasmore.be')) {
                    throw new Exception("Enter your Thomas More email address.");
                }
            }

            if($this->emailExistsAlready($email)) {
                throw new Exception("This email has already been registered.");
            }
        }

        // does the email already exist
        public static function emailExists($email){ 
            $conn = Db::getInstance();
            $statement = $conn->prepare("select count(*) as count from users where email = :email");
            $statement->bindValue(":email", $email);     
            $statement->execute();
            $count = $statement->fetchColumn();

            $response = "<span style='color: #bffd00;'>Email is available.</span>";

            if($count > 0) {
                $response = "<span style='color: #fcd7f7;'>Email is not available.</span>";
            }
         
            echo $response;
            exit;
        }

        // what if the username already exists
        private function emailExistsAlready($email){ 
            $conn = Db::getInstance();
            $statement = $conn->prepare("select id from users where email = :email");
            $statement->bindValue(":email", $email);            
            $statement->execute();
            $result = $statement->fetch();

            if(!$result){
                return false;
            } 
            else {
                // return false if the result is the users own email
                if (!empty($this->userId)) {
                    if ($result['id'] === $this->userId) {
                        return false;
                    }
                }
                return true;
            }
        }

        // password
        public function setPassword($password) {
            self::checkPassword($password);

            $options = [
                'cost' => 12,
            ];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);

            $this->password = $password;
        }

        public function getPassword() {
            return $this->password;
        }
        
        // password check
        private function checkPassword($password){
            if($password === ""){
                throw new Exception("Please enter a valid password.");
            }

            if(strpos($password, " ")){
                throw new Exception("The password cannot contain blank spaces.");
            }

            if(strlen($password) <= 5) {
                throw new Exception("Set a minimum password length of 6 characters.");
            }
        }

        // signup
        public function signup() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");
            $statement->bindValue(":username", $this->username);
            $statement->bindValue(":email", $this->email);
            $statement->bindValue(":password", $this->password);
            $statement->execute();
            return $conn->lastInsertId();
        }

        // login
        public static function canLogin($username, $password) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from users where username = :username");
            $statement->bindValue(":username", $username);
            $statement->execute();
            $user = $statement->fetch();
            $hash = $user['password'];

            if(!$user) {
                return false;
            }
            
            if(password_verify($password, $hash)) {
                return $user;
            } 
            else {
                return false;
            }
        }

        // get the user id (in URL) from the username
        public static function getUserIdByUsername($username) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select id from users where username = :username");
            $statement->bindValue(":username", $username);
            $statement->execute();
            $result = $statement->fetch();
            return $result['id'];
        }

        // get the avatar based on the user id
        public static function getAvatarById($userId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select profile_picture from users where id = :userId");
            $statement->bindValue(":userId", $userId);
            $statement->execute();
            $avatar = $statement->fetch();
            return $avatar["profile_picture"];

            var_dump($avatar);
        }
        
        // update the avatar
        public function updateAvatar($userId, $picture){
            $conn = Db::getInstance();
            $statement = $conn->prepare("update users set users.profile_picture = :picture where id = :userId");
            $statement->bindValue(":userId", $userId);
            $statement->bindValue(":picture", $picture);
            $result = $statement->execute();
            return $result;
        }
    }