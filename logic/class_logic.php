<?php

require_once('model/class.php');
require_once('entities/class.php');

class ClassLogic
{


    public function getAllClass()
    {
       
        $listClasses = [];
        try {
            $mClass = new MClass();
            $listClasses = $mClass->all();
        } catch (PDOException $e) {
            throw $e;
        }
        return $listClasses;
    }

    public function addClass($class)
    {

        try {
           

            $mClass = new MClass();

            $mClass->add($class);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function getLastClass()
    {
        try {
           

            $mClass = new MClass();

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
           
            $mClass = new MClass();
            $class = $mClass->getOne($id);
        } catch (PDOException $ex) {
            throw $ex;
        }
        return $class;
    }
}
