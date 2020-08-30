<?php
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     } 
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
                $username = addslashes($_POST['username']);
                $password = addslashes($_POST['password']);
                $account = $accountLogic->getUser($username, $password);
                if($account->id > 0) {
                    $_SESSION['username'] = $username;
                    $_SESSION['account'] = $account;
                    header('Location: ./');
                } else {
                    $data = array(
                        "error" => "Username or password wrong, please try again"
                    );
                }
            }
           $this->render('login', $data);
        }
        public function logout() {
            unset($_SESSION["username"]);
            header("Location: ./");
        }
    }