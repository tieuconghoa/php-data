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
        $capacities =$capacityLogic->getAlCapacity();
        $studentLast = $studentLogic->getLastStudent();
        $classes = $classLogic->getAllClass();
        
        if($studentLast == null) {
            $studentLast = new Student(0,null,null,null);
        }
        $data = array(
            "action" => $actions, 
            "capacities" => $capacities,
            "student" => $studentLast,
            "classes" => $classes
        );
        

        if (isset($_POST['submit'])) {

            $student_name = $_POST['student_name'];
            $student_address = $_POST['student_address'];
            $student_id = $_POST['student_id'];
            $student_class = $_POST['student_class'];

            $student = new Student($student_id, $student_class, $student_name, $student_address);

            $listStudentAction = [];

            foreach($actions as $action) {
                
                $listStudentAction[] = new StudentAction($student_id, $action->action_id, $_POST["$action->action_id"]);
            }

            $stLogic = new StudentLogic();
            $stLogic->addStudent($student,  $listStudentAction);

            header('Location: ./');
           
        }
        $this->render('add', $data);
    }
}
