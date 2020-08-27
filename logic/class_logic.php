<?php

require_once('model/class.php');
require_once('entities/class.php');

class ClassLogic
{


    public function getAllClass()
    {
        $db = DB::getInstance();
        $listClasses = [];
        try {
            $mClass = new MClass($db);
            $listClasses = $mClass->all();
        } catch (PDOException $e) {
            throw $e;
        }
        return $listClasses;
    }

    public function addClass($class)
    {

        try {
            $db = DB::getInstance();

            $mClass = new MClass($db);

            $mClass->add($class);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getLastClass()
    {
        try {
            $db = DB::getInstance();

            $mClass = new MClass($db);

            $listClasses = $this->getAllClass();
            $listClassIds = [];
            foreach ($listClasses as $class) {
                $listClassIds[] = $class->class_id;
            }
            if (!empty($listClassIds)) {

                $lastId = (int)max($listClassIds);

                $class = $mClass->getOne($lastId);
            }
        } catch (PDOException $ex) {
            throw $ex;
        }
        return $class;
    }

    public function getDetailClass($id)
    {
        try {
            $db = DB::getInstance();
            $mClass = new MClass($db);
            $class = $mClass->getOne($id);
        } catch (PDOException $ex) {
            throw $ex;
        }
        return $class;
    }
}
