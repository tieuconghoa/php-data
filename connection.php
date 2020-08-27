<?php

class DB
{
  private static $instance = NULl;
  public static function getInstance()
  {


    if (!isset(self::$instance)) {
      try {
        define("HOSTNAME", "localhost");
        define("DBNAME", "inout"); //dbname
        define("USERNAME", "root");
        define("PASSWORD", "");
        self::$instance = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DBNAME, USERNAME, PASSWORD);
        self::$instance->exec("SET NAMES 'utf8'");
      } catch (PDOException $ex) {
        die($ex->getMessage());
      }
    }
    return self::$instance;
  }
}
