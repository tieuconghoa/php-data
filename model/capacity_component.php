<?php
require_once('model/base_model.php');
require_once('entities/capacity_component.php');

class MCapacityComponent extends BaseModel
{
    public function all()
    {
        $list = array();

        $req = parent::openConnection()->query('SELECT * FROM capacity_component');

        while ($item = $req->fetch()) {

            $list[] = new CapacityComponent($item['id'], $item['capacity_id'], $item['capacity_component_value']);
        }
        return $list;
    }

    public function add($capacity_component)
    {

        $sql = "INSERT INTO capacity_component(capacity_id, capacity_component_value) VALUES(?, ?)";

        $req = parent::openConnection()->prepare($sql);

        $req->execute([$capacity_component->capacity_id, $capacity_component->capacity_component_value]);
    }
}
