<?php 

    require_once('controllers/base_controller.php');
    require_once('logic/capacity_logic.php');
    require_once('entities/capacity.php');

    class CapacityController extends BaseController{

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
    }


?>