<?php
    class Student {

    public $student_id;
    public $student_class_id;
    public $student_name;
    public $student_address;

    public function __construct($_student_id, $_student_class_id, $_student_name, $_student_address)
    {
        $this->student_id = $_student_id;
        $this->student_class_id = $_student_class_id;
        $this->student_name = $_student_name;
        $this->student_address = $_student_address;
    }
}
