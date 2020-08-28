<?php
    require_once('model/account.php');

    class AccountLogic {

        public function getUser($username, $password)
        {
            $mAccount = new MAccount();

            $account = $mAccount->getUserByUsername($username, $password);

            if($account > 0) {
                return true;
            } else {
                return false;
            }           
        }
    }