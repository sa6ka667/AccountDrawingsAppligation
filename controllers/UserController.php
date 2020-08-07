<?php
    include_once ROOT.'/models/user.php';
    class UserController{

        public function actionRegistration(){
            $firstName = '';
            $secondName = '';
            $login = '';
            $password = '';
            $secondPassword = '';
            $result = false;
            if (isset($_POST['submit'])){
                $firstName = $_POST['firstName'];
                $secondName = $_POST['secondName'];
                $login = $_POST['login'];
                $password = $_POST['password1'];
                $secondPassword = $_POST['password2'];

                $errors = false;

                if(!User::checkFirstName($firstName)){
                    $errors[] = 'Имя не должно быть короче двух символов.';
                }
                if(!User::checkSecondName($secondName)){
                    $errors[] = 'Фамилия не должна быть короче двух символов.';
                }
                if(!User::checkLogin($login)){
                    $errors[] = 'Логин не должен быть короче шести символов.';
                }
                if(!User::checkPassword($password)){
                    $errors[] = 'Пароль не должен быть короче восьми символов.';
                }
                if($password != $secondPassword){
                    $errors[] = 'Пароли не совпадают.';
                }
                if(User::checkLoginExists($login)){
                    $errors[] = 'Такой логин уже занят другим пользователем.';
                }
                if($errors == false){
                    $result = User::register($firstName,$secondName,$login,$password);
                }
            }
            include_once ROOT.'/views/site/registration.php';
        }
        public function actionLogin(){
            $login ='';
            $password = '';
            if(isset($_POST['submit'])){
                $login = $_POST['login'];
                $password = $_POST['password'];
                $errors = false;
                if(!User::checkLogin($login)){
                    $errors[] = 'Логин должен быть не короче шести символов.';
                }
                if(!User::checkPassword($password)){
                    $errors[] = 'Пароль должен быть не короче восьми символов.';
                }

                $userName = User::checkUserData($login, $password);
                if($userName){
                    User::auth($userName);
                    header("Location: http://localhost/drawings");
                }
                else{
                    $errors[] = 'Неверные данные для входа.';
                }
            }
            include_once ROOT.'/views/site/login.php';
        }
        public function actionExit(){
            User::unlogin();
            header('Location: http://localhost/');
        }
    }
?>
