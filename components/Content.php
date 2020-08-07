<?php
    class Content{
        // title -> varable -> String
        public static function getHeader($title){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link rel="stylesheet" href="http://localhost/styles/materialize.min.css">
                <link rel="stylesheet" href="http://localhost/styles/styles.min.css">
                <title><?php echo $title; ?></title>
            </head>
            <body>

            <?php
        }
        public static function getSideBar(){
            ?>
            <div class="navbar-fixed">
                <nav>
                    <div class="nav-wrapper blue darken-2 ">
                        <a href="#" class="brand-logo">Unihimtek</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li class="bold"><a href="http://localhost/drawings" class="waves-effect waves-light">Главная</a></li>
                            <li class="bold"><a href="http://localhost/drawings/add" class="waves-effect waves-light">Добавить запись</a></li>
                            <li class="bold"><a href="http://localhost/drawings/search" class="waves-effect waves-light">Поиск</a></li>
                            <li class="bold"><a href="http://localhost/drawings/history" class="waves-effect waves-light">История</a></li>
                            <li class="bold last"><a href="http://localhost/exit" class="waves-effect waves-light">Выйти</a></li>
                        </ul>
                    </div>
                </nav>
            </div>  
            <?php
        }
        public static function getFloatingButtons(){
            ?>
                <!--Floating button-->
                <div class="fixed-action-btn">
                    <a class="btn-floating btn-large red" href = "http://localhost/drawings/add">
                        <i class="large material-icons">add</i>
                    </a>
                    <ul>
                        <li><a class="btn-floating green" href = "http://localhost/drawings/search"><i class="material-icons">search</i></a></li>
                        <li><a class="btn-floating blue" href = "http://localhost/drawings/history"><i class="material-icons">history</i></a></li>
                    </ul>
                </div>
            <?php
        }
        public static function getScripts(){
            ?>
                <script src="http://localhost/scripts/materialize.min.js"></script>
                <script src="http://localhost/scripts/scripts.js"></script>
            <?php
        }
    }
?>