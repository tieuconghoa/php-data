<?php
require_once('controllers/base_controller.php');
require_once('model/student.php');
require_once('model/action.php');
require_once('model/capacity.php');
require_once('logic/action_logic.php');
require_once('logic/student_logic.php');
require_once('logic/capacity_logic.php');
require_once('logic/class_logic.php');

class StudentsController extends BaseController
{

    function __construct()
    {
        $this->folder = 'students';
    }

    public function list()
    {
        $studentLogic = new StudentLogic();
        $student =  $studentLogic->getAllStudent();
        $data = array('students' => $student);
        $this->render('list', $data);
    }

    public function add()
    {
        $actionLogic = new ActionLogic();
        $studentLogic = new StudentLogic();
        $capacityLogic = new CapacityLogic();
        $classLogic = new ClassLogic();
        $actions = $actionLogic->getAllAction();
        $capacities = $capacityLogic->getAlCapacity();
        $studentLast = $studentLogic->getLastStudent();
        $classes = $classLogic->getAllClass();

        if ($studentLast == null) {
            $studentLast = new Student(0, null, null, null, null);
        }
        $data = array(
            "action" => $actions,
            "capacities" => $capacities,
            "student" => $studentLast,
            "classes" => $classes
        );


        $this->render('add', $data);
    }
    public function addConfirm()
    {
        $data = array();
        $actionLogic = new ActionLogic();
        $stLogic = new StudentLogic();
        $classLogic = new ClassLogic();
        if (isset($_POST['submit-add'])) {

            $actions = $actionLogic->getAllAction();

            $student_name = $_POST['student_name'];
            $student_address = $_POST['student_address'];
            $student_birthday = $_POST['student_birthday'];
            $student_id = $_POST['student_id'];
            $student_class = $_POST['student_class'];

            $student = new Student($student_id, $student_class, $student_name, $student_birthday, $student_address);

            $listStudentActions = [];
            $listStudentAction = [];

            foreach ($actions as $action) {

                $listStudentAction[] = new StudentAction($student_id, $action->action_id, $_POST["$action->action_id"]);
                $listStudentActions[] =  new StudentAction($student_id, $action->action_value, $_POST["$action->action_id"]);
            }
            $className = $classLogic->getDetailClass($student_class);

            $data = array(
                "student" => $student,
                "listStudentAction" => $listStudentActions,
                "className" => $className
            );

            $_SESSION["data"] =  array(
                "student" => $student,
                "listStudentAction" => $listStudentAction,
                "className" => $className
            );
            $this->render('addConfirm', $data);
        } else {
            if (isset($_POST['submit'])  && $_POST['submit'] == "Xác nhận") {
                $data =  unserialize (serialize ($_SESSION["data"]));
                $stLogic->addStudent($data['student'],  $data['listStudentAction']);
                header('Location: ./');
            } else {
                header('Location: ./');
            }
        }
    }

    public function detail()
    {
        $studentLogic = new StudentLogic();
        $id = $_GET['id'] ? $_GET['id'] : 0;
        $evaluate = 0;
        if($id != 0) {
            $detailStudent = $studentLogic->getDetailStudent($id);
         }
         if(isset($detailStudent->student_id)) {
            foreach ($detailStudent->student_point as $key => $value) {
                $evaluate += $value[key($value)];
            }
             $data = array (
                "detailStudent" => $detailStudent,
                "evaluate" => $evaluate
            );
    
            $this->render('detail', $data);
         } else {
            $this->render('detail', array());
         }
        
       
    }
}
