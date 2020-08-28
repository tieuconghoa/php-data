<?php 
    require_once('model/base_model.php');
    
    class MAccount extends BaseModel {

        public function getUserByUsername($username, $password)
        {
            $sql = "SELECT * FROM account WHERE username = ? AND password = ?";

            $req = parent::openConnection()->prepare($sql);

            $req->execute([$username, $password]);

            $count = $req->rowCount();

            return $count;
        }
    }