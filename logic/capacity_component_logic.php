<?php
require_once('model/capacity_component.php');

class CapacityComponentLogic
{
    public function addCapacityComponent($capacityComponent) {
           
        try {
            $mCapacityComponent = new MCapacityComponent();
            $mCapacityComponent->add($capacityComponent);
        } catch(PDOException $ex) {
            throw $ex;
        }
    }

    public function getAllCapacityComponent() {
        $listCapacityComponent = [];
        try {
            $mCapacityComponent = new MCapacityComponent();
            $listCapacityComponent = $mCapacityComponent->all();
        } catch(PDOException $ex) {
            throw $ex;
        }
        return $listCapacityComponent;
    }
}