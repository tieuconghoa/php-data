<?php
require_once('controllers/base_controller.php');
require_once('logic/capacity_component_logic.php');
require_once('logic/capacity_logic.php');
require_once('entities/capacity_component.php');

class CapacityComponentController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'capacity_component';
    }
    public function add()
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
            var_dump($capacityComponent);
            $capacityComponentLogic->addCapacityComponent($capacityComponent);
            // header('Location: ./');
        }
        $this->render('add', $data);
    }
}
