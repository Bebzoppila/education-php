<?php
    class DataBase{
        private $connect = null;

        public function __construct($dataBaseName, $user, $password){
            $this->connect = new PDO("mysql:dbname=$dataBaseName;host=127.0.0.1", $user, $password);
        }


        public function queryDb($queryText, $params){
            $stmt = $this->connect->prepare($queryText);
            $stmt->execute($params);
            return $stmt;
        }
    }