<?php

class CapacityComponent
{
    public $id;
    public $capacity_id;
    public $capacity_component_value;

    public function __construct($id, $capacity_id, $capacity_component_value)
    {
        $this->id = $id;
        $this->capacity_id = $capacity_id;
        $this->capacity_component_value = $capacity_component_value;
    }
}