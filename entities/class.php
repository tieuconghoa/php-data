<?php
    class ClassStudent {

    public $class_id;
    public $class_name;

    public function __construct($_class_id, $_class_name)
    {
        $this->class_id = $_class_id;
        $this->class_name = $_class_name;
    }
}
