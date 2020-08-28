<?php 
    require_once('controllers/base_controller.php');
    require_once('logic/account_logic.php');

    class AccountController extends BaseController {

        public function __construct()
        {
            $this->folder = 'account';   
        }

        public function login()
        {
            $accountLogic = new AccountLogic();
            $data = [];
            if(isset($_POST['submit']))
            {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if($accountLogic->getUser($username, $password)) {
                    header('Location: http://localhost:8080/?controller=students&action=list');
                } else {
                    $data = array(
                        "error" => "Username or password wrong, please try again"
                    );
                }
            }
           $this->render('login', $data);
        }
    }