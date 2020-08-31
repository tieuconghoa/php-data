<?php 
    require_once('model/base_model.php');
    require_once('entities/account.php');
    
    class MAccount extends BaseModel {

        public function getUserByUsername($username, $password)
        {
            $sql = "SELECT a.id, a.username, a.password, ar.role
            FROM account as a
            JOIN account_role as ar
            ON a.role = ar.id WHERE a.username = ? AND a.password = ?";

            $req = parent::openConnection()->prepare($sql);
            $req->bindParam(1, $username);
            $req->bindParam(2, $password);
            $req->execute();
            
            if($req->rowCount() > 0) {
                $item = $req->fetch();
                $account = new Account($item['id'], $item['username'], $item['password'], $item['role']);
            } else {
                $account = new Account(0, null, null, null);
            }
            
            return $account;
        }
    }