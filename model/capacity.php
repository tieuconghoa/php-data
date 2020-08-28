<?php 
    include_once('entities/capacity.php');
    include_once('model/base_model.php');
    class MCapacity extends BaseModel {

        public function all()
        {
            $list = array();

            $req = parent::openConnection()->query('SELECT * FROM capacity');
    
            while($item = $req->fetch()){

                $list[] = new Capacity($item['capacity_id'], $item['capacity_value']);
                
            }
            return $list;
        }
        
        public function getOne($id)
        {
    
            $sql = "SELECT * FROM action WHERE id = ?";

            $req = parent::openConnection()->prepare($sql);

            $req->execute(array($id));
    
            while($item = $req->fetch()){

                $capacity = new Capacity($item['capacity_id'], $item['capacity_value']);
                
            }
            return $capacity;
        } 

        public function add($capacity) {

            $sql = "INSERT INTO capacity(capacity_value) VALUES(?)";

            $req = parent::openConnection()->prepare($sql);

            $req->execute([$capacity->capacity_value]);
        }
       
    }
?>