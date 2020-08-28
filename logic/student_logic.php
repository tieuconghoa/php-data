<?php 

    require_once('model/student.php');
    require_once('entities/student.php');
    require_once('model/student_action.php');

    class StudentLogic {

        public function addStudent($student, $studentAction) {
            try {
                $mStudent = new MStudent();
                $mStudentAction = new MStudentAction();
                $db = $mStudent->openConnection();
                print_r($db);
                $db->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
                $db->beginTransaction();
                
                $mStudentAction->setConnection($db);
                
                $mStudent->add($student);
                $mStudentAction->add($studentAction);             
                
                $db->commit();

            } catch (PDOException $e) {
                $db->rollBack();
                throw $e;
              }

        }
        public function getAllStudent() {
            $listStudents = [];
            try {
                $mStudent = new MStudent();
                $listStudents = $mStudent->getListStudentInfo();
            } catch(PDOException $e) {
                throw $e;
            }
            
            return $listStudents;
        }
        public function getLastStudent() {
            $student = null;
            try {
                $mStudent = new MStudent();
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

        public function getAllStudentByClassId($id) {
            $listStudents = [];
            try {
                $mStudent = new MStudent();
                $listStudents = $mStudent->getListStudentInfoByClass($id);
            } catch(PDOException $e) {
                throw $e;
            }
            
            return $listStudents;
        }
        public function getDetailStudent($id) {
            $students = null;
            try {
                $mStudent = new MStudent();
                $students = $mStudent->getDetailStudentInfo($id);
            } catch(PDOException $e) {
                throw $e;
            }
            
            return $students;
        }
    }
