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
            // the user must not enter a password that is less than 6 characters
            $password_input= $_POST['password'];
            if(empty($password) || strlen($password_input) <= 6) {
                throw new Exception("Set a minimum password length of 6 characters.");
            }
            $this->password = $password;
        }

        public function getPassword() {
            return $this->password;
        }

        public static function getAll() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from users");
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

        public function signup() {
            // password hash
            $options = [
                'cost' => 12,
            ];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);

            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into users (username, email, password) values (:username, :email, :password)");

            $statement->bindValue(":username", $this->username);
            $statement->bindValue(":email", $this->email);
            $statement->bindValue(":password", $password);
            $result = $statement->execute();
            return $result;
        }

        public function canSignup($password, $repeatPassword) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select email, password from users where email = :email");
            $statement->bindValue(":email", $this->email);
            $statement->execute();
            $user = ($statement->fetch());
            if(!$user) {
                if($password === $repeatPassword) {
                    return true;
                }
                else {
                    throw new Exception("The passwords do not match. Try again.");
                    return false;
                }
            }
            else {
                throw new Exception("This account already exists.");
                return false;
            }
        }

        public function login() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select email, password from users where email = :email");
            $statement->bindValue(":email", $this->email);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $hash = $user['password'];
                if (password_verify($this->password, $hash)) {
                    return true;
                } 
                else {
                    throw new Exception("The password is incorrect. Try again.");
                    return false;
                }
            }
            else {
                throw new Exception("The information does not match. Try again.");
            }
        }
    }