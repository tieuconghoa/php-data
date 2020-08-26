<?php 
    include_once('entities/class.php');
    
    class MClass {
        private $db;

        public function __construct($_db)
        {
            $this->db = $_db;
        }
        public function all()
        {
            $list = array();
    
            $req = $this->db->query('SELECT * FROM class');
    
            while($item = $req->fetch()){

                $list[] = new ClassStudent($item['class_id'], $item['class_name']);
                
            }
            return $list;
        } 

        public function add($class) {
            $sql = "INSERT INTO class(class_name) VALUES(?)";

            $req =  $this->db->prepare($sql);

            $req->execute([$class->class_name]);
        }

        public function getNameById($id) {
            $sql = "SELECT class_name from class WHERE class_id = ?";

            $req =  $this->db->prepare($sql);

            $req->execute([$id]);

            $nameClass = $req->fetch();

            return $nameClass;
            
        }
       
    }
?>