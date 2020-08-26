<?php 

    require_once('model/class.php');
    require_once('entities/class.php');

    class ClassLogic {

        
        public function getAllClass() {
            $db = DB::getInstance();
            $listClasses = [];
            try {
                $mClass = new MClass($db);
                $listClasses = $mClass->all();
            } catch(PDOException $e) {
                throw $e;
            }
            return $listClasses;
        }

        public function getNameById($id) {
            $db = DB::getInstance();
            $name = "";
            try {
                $mClass = new MClass($db);
                $name = $mClass->getNameById($id);
            } catch(PDOException $e) {
                throw $e;
            }
            return $name;
        }
    }
