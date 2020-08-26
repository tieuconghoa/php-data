<?php 

    require_once('model/student.php');
    require_once('entities/student.php');
    require_once('model/student_action.php');

    class StudentLogic {

        public function addStudent($student, $studentAction) {
            $db = DB::getInstance();
            try {

                $db->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
                $db->beginTransaction();
                
                $mStudent = new MStudent($db);
                $mStudentAction = new MStudentAction($db);
                $mStudent->add($student);
                $mStudentAction->add($studentAction);             
                
                $db->commit();

            } catch (PDOException $e) {
                $db->rollBack();
                throw $e;
              }

        }
        public function getAllStudent() {
            $db = DB::getInstance();
            $listStudents = [];
            try {
                $mStudent = new MStudent($db);
                $listStudents = $mStudent->getListStudentInfo();
            } catch(PDOException $e) {
                throw $e;
            }
            
            return $listStudents;
        }
        public function getLastStudent() {
            $db = DB::getInstance();
            $student = null;
            try {
                $mStudent = new MStudent($db);
                $listStudents = $this->getAllStudent();
                $listStudentIds = [];
                foreach($listStudents as $student) {
                    $listStudentIds[] = $student->student_id;
                }
                if(!empty($listStudentIds)) {

                    $lastId = (int)max($listStudentIds);
               
                    $student = $mStudent->getOne($lastId);
                }
                
                
            } catch(PDOException $e) {
                throw $e;
                
            }
            
            return $student;
        }
    }
