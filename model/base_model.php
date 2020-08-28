<?php 
    class BaseModel {
        private $instance = NULl;

        public function openConnection() {

            if (!isset($this->instance)) {
                try {
                  
                  $this->instance = new PDO('mysql:host=localhost;dbname=inout', "root", "0000");
                  $this->instance->exec("SET NAMES 'utf8'");
                } catch (PDOException $ex) {
                  die($ex->getMessage());
                }
              }
              return $this->instance;
        }

        public function getConnection() {
            return $this->instance;
        }
        public function setConnection($instance) {
            $this->instance = $instance;
        }
    }
