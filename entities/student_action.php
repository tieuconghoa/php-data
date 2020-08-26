<?php
    class StudentAction {

    public $student_id;
    public $action_id;
    public $action_point;

    public function __construct($_student_id, $_action_id, $_action_point)
    {
        $this->student_id = $_student_id;
        $this->action_id = $_action_id;
        $this->action_point = $_action_point;
    }
}
