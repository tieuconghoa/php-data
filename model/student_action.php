<?php 
    include_once('entities/student_action.php');
    
    class MStudentAction {

        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function all()
        {
            $list = array();
            
            $sql = 'SELECT * FROM student_action';

            $req =  $this->db->query($sql);
    
            while($item = $req->fetch()){

                $list[] = new StudentAction($item['student_id'], $item['action_id'], $item['action_point']);
                
            }
            return $list;
        } 

        public function add($studentAction) {

            $sql = "INSERT INTO student_action(student_id, action_id, action_point) VALUES(?,?,?)";
            $req = $this->db->prepare($sql);
            try {
                foreach($studentAction as $item) {
                    $req->execute([$item->student_id, $item->action_id, $item->action_point]);
                }
            } catch (PDOException $ex) {
                throw $ex;
              }
        }
       
    }
?>