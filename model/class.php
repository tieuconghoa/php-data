<?php 
    include_once('entities/class.php');
    include_once('model/base_model.php');
    class MClass extends BaseModel {

        public function all()
        {
            $list = array();
    
            $req = parent::openConnection()->query('SELECT * FROM class');
    
            while($item = $req->fetch()){

                $list[] = new ClassStudent($item['class_id'], $item['class_name']);
                
            }
            return $list;
        } 

        public function add($class) {
            $sql = "INSERT INTO class(class_id, class_name) VALUES(?, ?)";

            $req =  parent::openConnection()->prepare($sql);

            $req->execute([$class->class_id, $class->class_name]);
        }

        public function getOne($id) {
            
            $sql = "SELECT * from class WHERE class_id = ?";

            $req =  parent::openConnection()->prepare($sql);

            $req->execute(array($id));
    
            while($item = $req->fetch()){

                $class = new ClassStudent($item['class_id'], $item['class_name']);
                
            }
            return $class;
        }
       
    }
?>