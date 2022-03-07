<?php
    include_once 'models/baseModel.php';

    class User extends BaseModel{

        public function __construct(){
            parent::dbConnect();
        }

        public function register($login, $password){
            $queryParams = ['login' => $login, 'password' => $password];
            $queryText = "INSERT INTO user (login, password) VALUES (:login, :password)";
            $resultQuery = parent::$db->queryDb($queryText, $queryParams);
            return $resultQuery;
        }

        public function auth($login, $password){
            $queryParams = ['login' => $login, 'password' => $password];
            $queryText = 'SELECT * FROM user WHERE user.login = :login AND user.password = :password';
            $resultQuery = parent::$db->queryDb($queryText, $queryParams);
            return $resultQuery->fetch();
        }

        public function setNewKey($login, $key){
            $queryParams = ['login' => $login, 'key' => $key];
            $queryText = 'UPDATE user SET cookie = :key WHERE login = :login';
            $resultQuery = parent::$db->queryDb($queryText, $queryParams);
            return $resultQuery->fetch();
        }

        public function setNewProduct($userId, $productsId){
            $queryParams = ['userId' => $userId, 'productsId' => $productsId];
            $queryText = 'INSERT INTO userproducts (userId, productsId) VALUES (:userId, :productsId)';
            try {
                $resultQuery = parent::$db->queryDb($queryText, $queryParams);
                return $resultQuery->fetch();
            } catch (PDOException $Exception) {
                return  true;
            }
        }

        public function getAllUserProducts($userId){
            $queryParams = ['userId' => $userId,];
            $queryText = 'SELECT products.name,products.price,products.img FROM userproducts 
                        INNER JOIN products ON userproducts.productsId = products.id
                        WHERE userproducts.userId = :userId';
            $resultQuery = parent::$db->queryDb($queryText, $queryParams);
            return $resultQuery->fetchAll();
        }
    }