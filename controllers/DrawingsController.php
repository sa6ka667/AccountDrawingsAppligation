<?php
    include_once ROOT.'/models/drawings.php';
    include_once ROOT.'/models/history.php';
    class DrawingsController{

        public function actionIndex(){
            $drawingList = array();
            $drawingList = Drawings::getDrawingsList();
            include_once ROOT.'/views/product/getList.php';
            return true;
        }

        public function actionView($id){
            if($id){
                $drawingItem=Drawings::getDrawingItemById($id);
                include_once ROOT.'/views/product/getItem.php';
            }
            return true;
        }

        public function actionEdit($id){
            if($id){
                $name = '';
                $shaftDiametr = '';
                $stuffingBoxDiametr = '';
                $mountingDistance = '';
                $shaftRotationDirection = '';
                $workEnvironment = '';
                $plump = '';
                $customer = '';
                $drawingItem=Drawings::getDrawingItemById($id);
                $history = '';
                if (isset($_POST['edit'])){
                    $name = $_POST['name'];
                    $shaftDiametr = $_POST['shaftDiametr'];
                    $stuffingBoxDiametr = $_POST['stuffingBoxDiametr'];
                    $mountingDistance = $_POST['mountingDistance'];
                    $shaftRotationDirection = $_POST['shaftRotationDirection'];
                    $workEnvironment = $_POST['workEnvironment'];
                    $plump = $_POST['plump'];
                    $customer = $_POST['customer'];
                    $edition = Drawings::editItem($name, $shaftDiametr, $stuffingBoxDiametr, $mountingDistance,$shaftRotationDirection, $workEnvironment, $plump, $customer,$id);
                    if($edition){
                        $history = History::writeEdition($name,$id);
                    }
                }
                include_once ROOT.'/views/product/editItem.php';
            }

            return true;
        }

        public function actionAdd(){
            $name = '';
            $shaftDiametr = '';
            $stuffingBoxDiametr = '';
            $mountingDistance = '';
            $shaftRotationDirection = '';
            $workEnvironment = '';
            $plump = '';
            $customer = '';
            $history = '';
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $shaftDiametr = $_POST['shaftDiametr'];
                $stuffingBoxDiametr = $_POST['stuffingBoxDiametr'];
                $mountingDistance = $_POST['mountingDistance'];
                $shaftRotationDirection = $_POST['shaftRotationDirection'];
                $workEnvironment = $_POST['workEnvironment'];
                $plump = $_POST['plump'];
                $customer = $_POST['customer'];
                $assemblyPath = Drawings::getFilePath($_FILES['imAssembly']);
                $specificationPath = Drawings::getFilePath($_FILES['imSpecification']);
                $zipPDFPath = Drawings::getFilePath($_FILES['zipPDF']);
                $zipGRBPath = Drawings::getFilePath($_FILES['zipGRB']);
                $checkName = Drawings::checkDrawingExists($name);
                if(!$checkName){
                    $adding = Drawings::addItem($name, $shaftDiametr, $stuffingBoxDiametr, $mountingDistance,$shaftRotationDirection, $workEnvironment, $plump, $customer, $assemblyPath, $specificationPath, $zipPDFPath, $zipGRBPath);
                    $drawingItem = Drawings::getLastId($name);
                    $id = $drawingItem['id'];
                    if($adding){
                        $history = History::writeAdding($name, $id);
                    }
                }
            }
            include_once ROOT.'/views/product/addItem.php';
            return true;
        }

        public function actionSearch(){
            echo "actionSearch";
            return true;
        }

        public function actionHistory(){
            $drawingHistory = History::getHistoryList();
            include ROOT.'/views/product/getHistory.php';
            return true;
        }

        public function actionDelete($id){
            if($id){
                $drawingItem=Drawings::getDrawingItemById($id);
                $subject= $drawingItem['name'];
                $deletion = Drawings::deletion($id);
                if($deletion){
                    $history = History::writeDeletion($id,$subject);
                }
                include_once ROOT.'/views/product/deletion.php';
            }
            return true;            
        }
    }
?>