<?php 
    require_once('model/capacity.php');

    class CapacityLogic {

        public function addCapacity($capacity) {
           
            try {
                $mCapacity = new MCapacity();
                $mCapacity->add($capacity);
            } catch(PDOException $ex) {
                throw $ex;
            }
        }

        public function getAlCapacity() {
            $listCapacity = [];
            try {
                $mCapacity = new MCapacity();
                $listCapacity = $mCapacity->all();
            } catch(PDOException $ex) {
                throw $ex;
            }
            return $listCapacity;
        }
    }

?>