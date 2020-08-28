<?php 
    require_once('model/action.php');

    class ActionLogic {

        public function addAction($action) {
           
            try {
                $mAction = new MAction();
                $mAction->add($action);
            } catch(PDOException $ex) {
                throw $ex;
            }
        }

        public function getAllAction() {
            $listAction = [];
            try {
                $mAction = new MAction();
                $listAction = $mAction->all();
            } catch(PDOException $ex) {
                throw $ex;
            }
            return $listAction;
        }

        public function getLastAction() {
            try {    
                $mAction = new MAction();
    
                $listActions = $this->getAllAction();
                $listActionIds = [];
                foreach ($listActions as $action) {
                    $listActionIds[] = $action->action_id;
                }
                if (!empty($listActionIds)) {
    
                    $lastId = (int)max($listActionIds);
    
                    $action = $mAction->getOne($lastId);
                }
            } catch (PDOException $ex) {
                throw $ex;
            }
            return $action;
        }
    }

?>