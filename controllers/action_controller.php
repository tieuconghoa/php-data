<?php
    require_once('controllers/base_controller.php');
    require_once('logic/action_logic.php');
    require_once('logic/capacity_component_logic.php');
    require_once('entities/action.php');

    class ActionController extends BaseController{

        public function __construct()
        {
            $this->folder = 'action';
        }

        public function add() {
            
            $actionLogic = new ActionLogic();
            $capacityComponentLogic = new CapacityComponentLogic();
            $listCapacityComponent = $capacityComponentLogic->getAllCapacityComponent();

            $lastAction = $actionLogic->getLastAction();

            $data = array(
                'lastAction' => $lastAction,
                'listCapacityComponent' => $listCapacityComponent
            );
    
            if (isset($_POST['submit'])) {
                
                $actionId = $_POST['action_id'];
                $actionValue = $_POST['action_value'];
                $capacityComponentId = $_POST['capacity_component_id'];
                $action = new Action($actionId, $capacityComponentId, $actionValue);
    
                $actionLogic->addAction($action);
                header('Location: ./');
            }
            $this->render('add', $data);
            
        }
    }
