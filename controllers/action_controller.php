<?php
    require_once('controllers/base_controller.php');
    require_once('logic/action_logic.php');
    require_once('logic/capacity_logic.php');
    require_once('entities/action.php');

    class ActionController extends BaseController{

        public function __construct()
        {
            $this->folder = 'action';
        }

        public function add() {
            
            $actionLogic = new ActionLogic();
            $capacityLogic = new CapacityLogic();
            $listCapacity = $capacityLogic->getAlCapacity();

            $lastAction = $actionLogic->getLastAction();

            $data = array(
                'lastAction' => $lastAction,
                'listCapacity' => $listCapacity
            );
    
            if (isset($_POST['submit'])) {
                
                $actionId = $_POST['action_id'];
                $actionValue = $_POST['action_value'];
                $capacityId = $_POST['capacity_id'];
                $action = new Action($actionId, $capacityId, $actionValue);
    
                $actionLogic->addAction($action);
                header('Location: ./');
            }
            $this->render('add', $data);
            
        }
    }
