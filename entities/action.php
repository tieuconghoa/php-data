<?php 
    class Action {

        public $action_id;
        public $capacity_component_id;
        public $action_value;

        public function __construct($_action_id, $_capacity_component_id, $_action_value)
        {
            $this->action_id = $_action_id;
            $this->capacity_component_id = $_capacity_component_id;
            $this->action_value = $_action_value;
        }
    }

?>