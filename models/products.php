<?php
    include_once 'models/baseModel.php';

    class Products extends BaseModel{

        public function __construct(){
            parent::dbConnect();
        }

        public function getAll(){
            $resQuery = parent::$db->queryDb('SELECT * FROM products', []);
            return $resQuery->fetchAll();
        }
}