<?php 
    include_once('entities/action.php');
    include_once('model/base_model.php');
    
    class MAction extends BaseModel {
       
        public function all()
        {
            $list = array();
    
            $req = parent::openConnection()->query('SELECT * FROM action');
    
            while($item = $req->fetch()){

                $list[] = new Action($item['action_id'], $item['capacity_component_id'], $item['action_value']);
                
            }
            return $list;
        } 

        public function add($action) {

            $sql = "INSERT INTO action(action_id, capacity_component_id, action_value) VALUES(?, ?, ?)";

            $req = parent::openConnection()->prepare($sql);

            $req->execute([$action->action_id, $action->capacity_component_id, $action->action_value]);
        }

        public function getActionByCapacityComponent($capacity_component_id) {

            $sql = "SELECT * FROM action WHERE capacity_component_id = ?";

            $req = parent::openConnection()->prepare($sql);

            $req->execute([$capacity_component_id]);

            while($item = $req->fetch()){

                $actionList[] = new Action($item['action_id'], $item['capacity_component_id'], $item['action_value']);
                
            }
            return $actionList;
        }

        public function getOne($action_id) {

            $sql = "SELECT * FROM action WHERE action_id = ?";

            $req = parent::openConnection()->prepare($sql);

            $req->execute([$action_id]);

            while($item = $req->fetch()){

                $action = new Action($item['action_id'], $item['capacity_component_id'], $item['action_value']);
                
            }
            return $action;
        }
       
    }
?>