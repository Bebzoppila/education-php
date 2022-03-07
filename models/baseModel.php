<?php
    include_once 'assets/db.php';

    abstract class BaseModel{

        protected static $db = null;

        protected function dbConnect(){
            BaseModel::$db = new DataBase('articles', 'root', '');
        }
    }
