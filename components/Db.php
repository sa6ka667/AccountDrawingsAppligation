<?php
    class Db{
        public static function getConnection(){
            $dbConfig = ROOT . '/config/DBConfig.php';
            $params = include($dbConfig);
            $db = new PDO("mysql:host = {$params['host']};dbname={$params['dbname']}",$params['username'],$params['password']);
            return $db;
        }
    }
?>