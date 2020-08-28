<?php 
    include_once('entities/student_action.php');
    include_once('model/base_model.php');
    class MStudentAction extends BaseModel {

        public function all()
        {
            $list = array();
            
            $sql = 'SELECT * FROM student_action';

            $req =  parent::openConnection()->query($sql);
    
            while($item = $req->fetch()){

                $list[] = new StudentAction($item['student_id'], $item['action_id'], $item['action_point']);
                
            }
            return $list;
        } 

        public function add($studentAction) {

            $sql = "INSERT INTO student_action(student_id, action_id, action_point) VALUES(?,?,?)";
            $req = parent::openConnection()->prepare($sql);
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