<?php

require_once('controllers/base_controller.php');
require_once('logic/capacity_component_logic.php');
require_once('logic/capacity_logic.php');
require_once('entities/capacity_component.php');
require_once('entities/capacity.php');

class CapacityController extends BaseController
{

    public function __construct()
    {
        $this->folder = 'capacity';
    }

    public function add()
    {
        $capacityLogic = new CapacityLogic();

        if (isset($_POST['submit'])) {

            $capacityValue = $_POST['capacity_value'];

            $action = new Capacity(null, $capacityValue);

            $capacityLogic->addCapacity($action);

            header('Location: ./');
        }
        $this->render('add', array());
    }
    public function addComponent()
    {
        $capacityComponentLogic = new CapacityComponentLogic();
        $capacityLogic = new CapacityLogic();
        $listCapacity = $capacityLogic->getAlCapacity();

        $data = array(
            'listCapacity' => $listCapacity
        );

        if (isset($_POST['submit'])) {

            $capacityComponentValue = $_POST['capacity_component_value'];
            $capacityId = $_POST['capacity_id'];
            $capacityComponent = new CapacityComponent(null, $capacityId, $capacityComponentValue);

            $capacityComponentLogic->addCapacityComponent($capacityComponent);
            header('Location: ./');
        }
        $this->render('addComponent', $data);
    }
}
