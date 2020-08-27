<?php
require_once('controllers/base_controller.php');
require_once('logic/class_logic.php');
require_once('logic/student_logic.php');
require_once('entities/class.php');

class ClassesController extends BaseController
{

    function __construct()
    {
        $this->folder = 'classes';
    }

    public function add()
    {

        $classLogic = new ClassLogic();

        $lastClass = $classLogic->getLastClass();

        $data = array(
            'lastClass' => $lastClass
        );

        if (isset($_POST['submit'])) {
            
            $className = $_POST['class_name'];
            $classId = $_POST['class_id'];
            $class = new ClassStudent($classId, $className);

            $classLogic->addClass($class);
            header('Location: ./');
        }
        $this->render('add', $data);
    }

    public function list() {

        $classLogic = new ClassLogic();

        $classes = $classLogic->getAllClass();

        $data = array(
            "classes" => $classes
        );

        $this->render('list', $data);
    }

    public function detail() {
        $id = $_GET['id'] ? $_GET['id'] : 0;
        
        $studentLogic = new StudentLogic();

        if($id != 0) {
           $listStudent = $studentLogic->getAllStudentByClassId($id);
        }
        $data = array (
            "listStudent" => $listStudent
        );

        $this->render('detail', $data);
    }
}
