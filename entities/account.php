<?php
class Account
{
    public $id;
    public $usename;
    public $password;
    public $role;

    public function __construct($id, $usename, $password, $role)
    {
        $this->id = $id;
        $this->usename = $usename;
        $this->password = $password;
        $this->role = $role;
    }
}
