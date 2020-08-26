<?php
    class Capacity {

    public $capacity_id;
    public $capacity_value;

    public function __construct($_capacity_id, $_capacity_value)
    {
        $this->capacity_id = $_capacity_id;
        $this->capacity_value = $_capacity_value;
    }
}
