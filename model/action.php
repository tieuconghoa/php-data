<?php 
    include_once('entities/action.php');
    
    class MAction {
        private $db;

        public function __construct($_db)
        {
            $this->db = $_db;
        }
        public function all()
        {
            $list = array();
    
            $req = $this->db->query('SELECT * FROM action');
    
            while($item = $req->fetch()){

                $list[] = new Action($item['action_id'], $item['capacity_id'], $item['action_value']);
                
            }
            return $list;
        } 

        public function add($action) {

            $sql = "INSERT INTO action(action_id, capacity_id, action_value) VALUES(?, ?, ?)";

            $req = $this->db->prepare($sql);

            $req->execute([$action->action_id, $action->capacity_id, $action->action_value]);
        }

        public function getActionByCapacity($capacity_id) {

            $sql = "SELECT * FROM capacity WHERE capacity_id = ?";

            $req = $this->db->prepare($sql);

            $req->execute([$capacity_id]);

            while($item = $req->fetch()){

                $actionList[] = new Action($item['action_id'], $item['capacity_id'], $item['action_value']);
                
            }
            return $actionList;
        }

        public function getOne($action_id) {

            $sql = "SELECT * FROM action WHERE action_id = ?";

            $req = $this->db->prepare($sql);

            $req->execute([$action_id]);

            while($item = $req->fetch()){

                $action = new Action($item['action_id'], $item['capacity_id'], $item['action_value']);
                
            }
            return $action;
        }
       
    }
?>