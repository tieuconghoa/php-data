<?php 
    require_once('model/action.php');

    class ActionLogic {

        public function addAction($action) {
           
            try {
                $pdo = DB::getInstance();
                $mAction = new MAction($pdo);
                $mAction->add($action);
            } catch(PDOException $ex) {
                throw $ex;
            }
        }

        public function getAllAction() {
            $listAction = [];
            try {
                $pdo = DB::getInstance();
                $mAction = new MAction($pdo);
                $listAction = $mAction->all();
            } catch(PDOException $ex) {
                throw $ex;
            }
            return $listAction;
        }

        public function getLastAction() {
            try {
                $db = DB::getInstance();
    
                $mAction = new MAction($db);
    
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