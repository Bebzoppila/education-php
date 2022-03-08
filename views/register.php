<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $formAction = $baseUrl . '/register';
        $btnText = 'Регистрация';
        include_once 'components/form.php';
    }else{
        include_once 'models/user.php';
        $myUser = new User();
        $myUser->register($_POST['userName'], $_POST['password']);
        header('location:products');
    }
