<?php
    include ROOT.'/config/DBConfig.php';

    class History{

        public static function getHistoryList(){
            $db = Db::getConnection();
            $drawingHistory = array();

            $result = $db->query('SELECT * FROM `history`');
            $count = 0;
            while($row = $result->fetch()){
                $drawingHistory[$count]['date'] = $row['date'];
                $drawingHistory[$count]['time'] = $row['time'];
                $drawingHistory[$count]['subject'] = $row['subject'];
                $drawingHistory[$count]['action'] = $row['action'];
                $drawingHistory[$count]['actioner'] = $row['actioner'];
                $drawingHistory[$count]['position'] = $row['position'];
                $count++;
            }
            return $drawingHistory;
        }

        public static function writeEdition($subject, $id){
            $db = Db::getConnection();
            $time = date("H:i:s");
            $date = date("yy-m-d");
            $sql = 'INSERT INTO `history` (subject, action, actioner, date, time, position) VALUES (:subject, "Изменён", :actioner, :date, :time, :position)';
            $result = $db->prepare($sql);
            $result->bindParam(':subject', $subject, PDO::PARAM_STR);
            $result->bindParam(':actioner', $_SESSION['user'], PDO::PARAM_STR);
            $result->bindParam(':date', $date, PDO::PARAM_STR);
            $result->bindParam(':time', $time, PDO::PARAM_STR);
            $result->bindParam(':position', $id, PDO::PARAM_STR);
            return $result->execute();

        }

        public static function writeDeletion($id,$subject){
            $db = Db::getConnection();
            $time = date("H:i:s");
            $date = date("yy-m-d");
            $sql = 'INSERT INTO `history` (subject, action, actioner, date, time, position) VALUES (:subject, "Удалён", :actioner, :date, :time, :position)';
            $result = $db->prepare($sql);
            $result->bindParam(':subject', $subject, PDO::PARAM_STR);
            $result->bindParam(':actioner', $_SESSION['user'], PDO::PARAM_STR);
            $result->bindParam(':date', $date, PDO::PARAM_STR);
            $result->bindParam(':time', $time, PDO::PARAM_STR);
            $result->bindParam(':position', $id, PDO::PARAM_STR);
            return $result->execute();
        }

        public static function writeAdding($name, $id){
            $db = Db::getConnection();
            $time = date("H:i:s");
            $date = date("yy-m-d");
            $sql = 'INSERT INTO `history` (subject, action, actioner, date, time, position) VALUES (:subject, "Добавлен", :actioner, :date, :time, :position)';
            $result = $db->prepare($sql);
            $result->bindParam(':subject', $name, PDO::PARAM_STR);
            $result->bindParam(':actioner', $_SESSION['user'], PDO::PARAM_STR);
            $result->bindParam(':date', $date, PDO::PARAM_STR);
            $result->bindParam(':time', $time, PDO::PARAM_STR);
            $result->bindParam(':position', $id, PDO::PARAM_STR);
            return $result->execute();
        }
    }