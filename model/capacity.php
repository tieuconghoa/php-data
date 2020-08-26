<?php 
    include_once('entities/capacity.php');
    
    class MCapacity {
        private $db;

        public function __construct($_db)
        {
            $this->db = $_db;
        }
        public function all()
        {
            $list = array();

            $req = $this->db->query('SELECT * FROM capacity');
    
            while($item = $req->fetch()){

                $list[] = new Capacity($item['capacity_id'], $item['capacity_value']);
                
            }
            return $list;
        }
        
        public function getOne($id)
        {
    
            $sql = "SELECT * FROM action WHERE id = ?";

            $req = $this->db->prepare($sql);

            $req->execute(array($id));
    
            while($item = $req->fetch()){

                $capacity = new Capacity($item['capacity_id'], $item['capacity_value']);
                
            }
            return $capacity;
        } 

        public function add($capacity) {

            $sql = "INSERT INTO action(capacity_value) VALUES(?)";

            $req = $this->db->prepare($sql);

            $req->execute([$capacity->capacity_value]);
        }
       
    }
?>