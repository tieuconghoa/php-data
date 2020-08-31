<?php 
    include_once('entities/student.php');
    include_once('entities/student_info.php');
    include_once('model/base_model.php');
    
    class MStudent extends BaseModel {

        public function all()
        {
            $list = array();
    
            $req = parent::openConnection()->query('SELECT * FROM student');
    
            while($item = $req->fetch()){
                $list[] = new Student($item['student_id'], $item['student_class_id'], $item['student_name'], $item['student_birthday'],$item['student_address']);
            }
            return $list;
        } 
        public function add($student) {

            $sql = "INSERT INTO student(student_class_id, student_name, student_birthday, student_address) VALUES (?, ?, ?, ?)";

            $req = parent::openConnection()->prepare($sql);

            $req->execute(array($student->student_class_id, $student->student_name, $student->student_birthday, $student->student_address));

        }
        public function getOne($id)
        {
            $student = null;
            
            $req = parent::openConnection()->prepare('SELECT * FROM student WHERE student_id = ?');
            
            $req->execute(array($id));
    
            while($item = $req->fetch()){

                $student = new Student($item['student_id'], $item['student_class_id'], $item['student_name'], $item['student_birthday'], $item['student_address']);
                
            }
            return $student;
        } 

        public function getListStudentInfo() {

            $listStudentInfo = [];

            $sql = "SELECT s.student_id, s.student_name, s.student_birthday, s.student_address, s.student_class_id, c.class_name, SUM(sa.action_point) as student_point
            FROM `student` as s
            LEFT JOIN class as c ON s.student_class_id = c.class_id
            LEFT JOIN student_action as sa ON s.student_id = sa.student_id
            GROUP BY s.student_id";

            $req = parent::openConnection()->query($sql);

            while($item = $req->fetch()) {
                $listStudentInfo[] = new StudentInfo($item['student_id'], $item['student_class_id'], $item['student_name'], $item['student_birthday'], $item['student_address'],  $item['class_name'],  $item['student_point']);
            }

            return $listStudentInfo;
        }

        public function getDetailStudentInfo($id) {

            $studentInfo = null;

            $sql = "SELECT s.student_id, s.student_name, s.student_birthday, s.student_address, s.student_class_id, a.action_value, c.class_name, sa.action_point as student_point
            FROM `student` as s
            LEFT JOIN class as c ON s.student_class_id = c.class_id
            LEFT JOIN student_action as sa ON s.student_id = sa.student_id
			LEFT JOIN action as a ON a.action_id = sa.action_id
			WHERE s.student_id = ?";

            $req = parent::openConnection()->prepare($sql);
            $req->execute(array($id));

            while($item = $req->fetch()) {
               $student_id = $item['student_id'];
               $student_class_id = $item['student_class_id'];
               $student_name = $item['student_name'];
               $student_address = $item['student_address'];
               $student_birthday = $item['student_birthday'];
               $class_name = $item['class_name'];
               $listPoint[] = array(
                $item['action_value'] =>  $item['student_point']
               );
            }
            if(isset($student_id)) {
                $studentInfo = new StudentInfo($student_id, $student_class_id, $student_name, $student_birthday, $student_address, $class_name, $listPoint);
            }
           
            return $studentInfo;
        }

        public function getListStudentInfoByClass($class_id) {

            $listStudentInfo = [];

            $sql = "SELECT s.student_id, s.student_name, s.student_birthday, s.student_address, s.student_class_id, c.class_name, SUM(sa.action_point) as student_point
            FROM `student` as s
            LEFT JOIN class as c ON s.student_class_id = c.class_id
            LEFT JOIN student_action as sa ON s.student_id = sa.student_id
            WHERE s.student_class_id = ?
            GROUP BY s.student_id";

            $req = parent::openConnection()->prepare($sql);
            $req->execute(array($class_id));

            while($item = $req->fetch()) {
                $listStudentInfo[]= new StudentInfo($item['student_id'], $item['student_class_id'], $item['student_name'], $item['student_birthday'], $item['student_address'],  $item['class_name'],  $item['student_point']);
            }

            return $listStudentInfo;
        }
       
    }
