<?php 
    include_once('entities/student.php');
    include_once('entities/student_info.php');
    
    class MStudent {
        private $db;

        public function __construct($_db)
        {
            $this->db = $_db;
        }

        public function all()
        {
            $list = array();
    
            $req = $this->db->query('SELECT * FROM student');
    
            while($item = $req->fetch()){
                $list[] = new Student($item['student_id'], $item['student_class_id'], $item['student_name'], $item['student_address']);
            }
            return $list;
        } 
        public function add($student) {

            $sql = "INSERT INTO student(student_class_id, student_name,student_address) VALUES (?, ?, ?)";

            $req = $this->db->prepare($sql);

            $req->execute(array($student->student_class_id, $student->student_name, $student->student_address));

        }
        public function getOne($id)
        {
            $student = null;
            
            $req = $this->db->prepare('SELECT * FROM student WHERE student_id = ?');
            
            $req->execute(array($id));
    
            while($item = $req->fetch()){

                $student = new Student($item['student_id'], $item['student_class_id'], $item['student_name'], $item['student_address']);
                
            }
            return $student;
        } 

        public function getListStudentInfo() {

            $listStudentInfo = [];

            $sql = "SELECT s.student_id, s.student_name, s.student_address, s.student_class_id, c.class_name, SUM(sa.action_point) as student_point
            FROM `student` as s
            LEFT JOIN class as c ON s.student_class_id = c.class_id
            LEFT JOIN student_action as sa ON s.student_id = sa.student_id
            GROUP BY s.student_id";

            $req = $this->db->query($sql);

            while($item = $req->fetch()) {
                $listStudentInfo[] = new StudentInfo($item['student_id'], $item['student_class_id'], $item['student_name'], $item['student_address'],  $item['class_name'],  $item['student_point']);
            }

            return $listStudentInfo;
        }

       
    }
?>