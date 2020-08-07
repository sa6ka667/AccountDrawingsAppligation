<?php
    include ROOT.'/config/DBConfig.php';

    class User{
        public static function register($firstName, $secondName, $login, $password){
            $db = Db::getConnection();
            $name = $firstName.' '.$secondName;
            $sql = 'INSERT INTO `user` (name, login, password) VALUES (:name, :login, SHA(:password))';
            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':login', $login, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            return $result->execute();
        }

        public static function checkUserData($login, $password){
            $db = Db::getConnection();
            $sql = 'SELECT * FROM `user` WHERE `login` = :login AND `password` = SHA(:password)';
            $result = $db->prepare($sql);
            $result->bindParam(':login', $login, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            $result->execute();
            $user = $result->fetch();
            if($user['name']){
                return $user['name'];
            }
            return false;
        }

        public static function unlogin(){
            unset($_SESSION['user']);
        }

        public static function auth($userName){
            $_SESSION['user'] = $userName;
        }

        public static function checkFirstName($firstName){
            if(strlen($firstName) >= 2){
                return true;
            }
            return false;
        }
        public static function checkSecondName($secondName){
            if(strlen($secondName) >= 2){
                return true;
            }
            return false;
        }
        public static function checkLogin($login){
            if(strlen($login) >= 6){
                 return true;
            }
            return false;
        }
        public static function checkPassword($password){
            if(strlen($password) >= 8){
                return true;
           }
           return false;
        }
        public static function checkLoginExists($login){
            $db = Db::getConnection();

            $sql = 'SELECT COUNT(*) FROM user WHERE `login` = :login';
            $result = $db->prepare($sql);
            $result->bindParam(':login', $login, PDO::PARAM_STR);
            $result->execute();
            if($result->fetchColumn()){
                return true;
            }
            return false;

        }
    }
?>