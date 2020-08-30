<?php 

    class StudentInfo {
       
        public $student_id;
        public $student_class_id;
        public $student_name;
        public $student_address;
        public $student_birthday;
        public $student_class_name;
        public $student_point;
 
        public function __construct($student_id, $student_class_id, $student_name,  $student_birthday, $student_address, $student_class_name, $student_point)
        {
            $this->student_id = $student_id;
            $this->student_class_id = $student_class_id;
            $this->student_name = $student_name;
            $this->student_birthday = $student_birthday;
            $this->student_address = $student_address;
            $this->student_class_name = $student_class_name;
            $this->student_point = $student_point;
        }
    }

?>