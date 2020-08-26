<?php 
    require_once('model/capacity.php');

    class CapacityLogic {

        public function addAction($capacity) {
           
            try {
                $pdo = DB::getInstance();
                $mCapacity = new MCapacity($pdo);
                $mCapacity->add($capacity);
            } catch(PDOException $ex) {
                throw $ex;
            }
        }

        public function getAlCapacity() {
            $listCapacity = [];
            try {
                $pdo = DB::getInstance();
                $mCapacity = new MCapacity($pdo);
                $listCapacity = $mCapacity->all();
            } catch(PDOException $ex) {
                throw $ex;
            }
            return $listCapacity;
        }
    }

?>