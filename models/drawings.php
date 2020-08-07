<?php
    include ROOT.'/config/DBConfig.php';
    include ROOT.'/components/Content.php';
    class Drawings{

        public static function getDrawingItemById($id){
            $db = Db::getConnection();
            $drawingItem = array();
            $sql = 'SELECT * FROM `product` WHERE `id`= :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();
            while($row = $result->fetch()){
                $drawingItem['id'] = $row['id'];
                $drawingItem['name'] = $row['name'];
                $drawingItem['shaftDiametr'] = $row['shaftDiametr'];
                $drawingItem['stuffingBoxDiametr'] = $row['stuffingBoxDiametr'];
                $drawingItem['mountingDistance'] = $row['mountingDistance'];
                $drawingItem['shaftRotationDirection'] = $row['shaftRotationDirection'];
                $drawingItem['customer'] = $row['customer'];
                $drawingItem['workEnvironment'] = $row['workEnvironment'];
                $drawingItem['plump'] = $row['plump'];
                $drawingItem['dateOfDevelopment'] = $row['dateOfDevelopment'];
                $drawingItem['timeOfDevelopment'] = $row['timeOfDevelopment'];
                $drawingItem['developer'] = $row['developer'];
                $drawingItem['imAssembly'] = $row['imAssembly'];
                $drawingItem['imSpecification'] = $row['imSpecification'];
                $drawingItem['zipPDF'] = $row['zipPDF'];
                $drawingItem['zipGRB'] = $row['zipGRB'];

            }
            return $drawingItem;
        
        }

        public static function getDrawingsList(){
            $db = Db::getConnection();
            $drawingList = array();

            $result = $db->query('SELECT * FROM `product`');
            $count = 0;
            while($row = $result->fetch()){
                $drawingList[$count]['id'] = $row['id'];
                $drawingList[$count]['name'] = $row['name'];
                $drawingList[$count]['shaftDiametr'] = $row['shaftDiametr'];
                $drawingList[$count]['stuffingBoxDiametr'] = $row['stuffingBoxDiametr'];
                $drawingList[$count]['mountingDistance'] = $row['mountingDistance'];
                $drawingList[$count]['shaftRotationDirection'] = $row['shaftRotationDirection'];
                $drawingList[$count]['customer'] = $row['customer'];
                $drawingList[$count]['workEnvironment'] = $row['workEnvironment'];
                $drawingList[$count]['plump'] = $row['plump'];
                $drawingList[$count]['dateOfDevelopment'] = $row['dateOfDevelopment'];
                $drawingList[$count]['timeOfDevelopment'] = $row['timeOfDevelopment'];
                $drawingList[$count]['developer'] = $row['developer'];
                $drawingList[$count]['imAssembly'] = $row['imAssembly'];
                $drawingList[$count]['imSpecification'] = $row['imSpecification'];
                $drawingList[$count]['zipPDF'] = $row['zipPDF'];
                $drawingList[$count]['zipGRB'] = $row['zipGRB'];
                $count++;

            }
            return $drawingList;
        }

        public static function deletion($id){
            $db = Db::getConnection();
            $sql = 'DELETE FROM `product` WHERE `id`= :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        public static function getFilePath($file){
            $image = addslashes(file_get_contents($file['tmp_name'])); 
            $filename = ($file['name']);
            $tmpfilename = ($file['tmp_name']);
            $linkNameFile = time(). '_' . basename($file['name']);
            $uploaddir = ROOT.'/files/';
            $filePath = $uploaddir . $linkNameFile;
            move_uploaded_file($tmpfilename, $filePath);
            echo $filePath;
            return $filePath;
        }

        public static function editItem($name, $shaftDiametr, $stuffingBoxDiametr, $mountingDistance,$shaftRotationDirection, $workEnvironment, $plump, $customer, $id){
            $db = Db::getConnection();
            $time = date("H:i:s");
            $date = date("yy-m-d");
            $sql = "UPDATE `product` SET `name` = :name, `shaftDiametr` = :shaftDiametr, `stuffingBoxDiametr` = :stuffingBoxDiametr, `mountingDistance` = :mountingDistance, `shaftRotationDirection` = :shaftRotationDirection, `workEnvironment` = :workEnvironment, `plump` = :plump, `customer` = :customer, `developer` = :developer, `dateOfDevelopment` = :dateOfDevelopment, `timeOfDevelopment` = :timeOfDevelopment WHERE `id` = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':shaftDiametr', $shaftDiametr, PDO::PARAM_STR);
            $result->bindParam(':stuffingBoxDiametr', $stuffingBoxDiametr, PDO::PARAM_STR);
            $result->bindParam(':mountingDistance', $mountingDistance, PDO::PARAM_STR);
            $result->bindParam(':shaftRotationDirection', $shaftRotationDirection, PDO::PARAM_STR);
            $result->bindParam(':workEnvironment', $workEnvironment, PDO::PARAM_STR);
            $result->bindParam(':plump', $plump, PDO::PARAM_STR);
            $result->bindParam(':customer', $customer, PDO::PARAM_STR);
            $result->bindParam(':developer', $_SESSION['user'], PDO::PARAM_STR);
            $result->bindParam(':dateOfDevelopment', $date, PDO::PARAM_STR);
            $result->bindParam(':timeOfDevelopment', $time, PDO::PARAM_STR);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        public static function addItem($name, $shaftDiametr, $stuffingBoxDiametr, $mountingDistance,$shaftRotationDirection, $workEnvironment, $plump, $customer, $assemblyPath, $specificationPath, $zipPDFPath, $zipGRBPath){
            $db = Db::getConnection();
            $time = date("H:i:s");
            $date = date("yy-m-d");
            $sql = 'INSERT INTO `product` (`name`, `shaftDiametr`, `stuffingBoxDiametr`, `mountingDistance`, `shaftRotationDirection`, `workEnvironment`, `plump`, `customer`, `developer`, `dateOfDevelopment`, `timeOfDevelopment`, `assemblyPath`, `specificationPath`, `zipPDFPath`, `zipGRBPath`) VALUES (:name, :shaftDiametr, :stuffingBoxDiametr, :mountingDistance, :shaftRotationDirection, :workEnvironment, :plump, :customer, :developer, :dateOfDevelopment, :timeOfDevelopment, :assemblyPath, :specificationPath, :zipPDFPath, :zipGRBPath)';
            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':shaftDiametr', $shaftDiametr, PDO::PARAM_STR);
            $result->bindParam(':stuffingBoxDiametr', $stuffingBoxDiametr, PDO::PARAM_STR);
            $result->bindParam(':mountingDistance', $mountingDistance, PDO::PARAM_STR);
            $result->bindParam(':shaftRotationDirection', $shaftRotationDirection, PDO::PARAM_STR);
            $result->bindParam(':workEnvironment', $workEnvironment, PDO::PARAM_STR);
            $result->bindParam(':plump', $plump, PDO::PARAM_STR);
            $result->bindParam(':customer', $customer, PDO::PARAM_STR);
            $result->bindParam(':developer', $_SESSION['user'], PDO::PARAM_STR);
            $result->bindParam(':dateOfDevelopment', $date, PDO::PARAM_STR);
            $result->bindParam(':timeOfDevelopment', $time, PDO::PARAM_STR);
            $result->bindParam(':assemblyPath', $assemblyPath, PDO::PARAM_STR);
            $result->bindParam(':specificationPath', $specificationPath, PDO::PARAM_STR);
            $result->bindParam(':zipPDFPath', $zipPDFPath, PDO::PARAM_STR);
            $result->bindParam(':zipGRBPath', $zipGRBPath, PDO::PARAM_STR);
            return $result->execute();
        }
    
        public static function checkDrawingExists($name){
            $db = Db::getConnection();
            $sql = "SELECT COUNT(*) FROM `product` WHERE `name` = :name";
            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->execute();
            if($result->fetchColumn()){
                return true;
            }
            return false;
        }

        public static function getLastId($name){
            $db = Db::getConnection();
            $sql = "SELECT `id` FROM `product` WHERE `name` = :name";
            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->execute();
            $drawingItem = array();
            while($row = $result->fetch()){
                $drawingItem['id'] = $row['id'];
            }
            echo "_________";
            echo $name;
            print_r($drawingItem);
            echo "_________";
            return $drawingItem;
        }
    }
?>