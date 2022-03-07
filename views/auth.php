<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $formAction = '/education/auth';
    $btnText = 'Авторизация';
    if(!empty($_SESSION['auth'])){
        echo 'Вы уже авторизованы';
    }else{
        include 'components/form.php';
    }

}else{
    include_once 'models/user.php';
    $myUser = new User();
    $userData = $myUser->auth($_POST['userName'], $_POST['password']);
    if(empty($userData)){
        header('location: /education/auth');
    }
    session_start();
    $_SESSION['auth'] = true;
    $_SESSION['id'] = $userData['id'];
    $_SESSION['login'] = $userData['login'];
    $allSimpols = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $key = substr(str_shuffle($allSimpols), 20, 26);
    setcookie('login', $userData['login'], time() + 60* 60 * 24 * 10); //логин
    setcookie('key', $key, time()+ 60 * 60 * 24 * 10); //случайная строка
    $myUser->setNewKey($userData['login'], $key);
    header('location: /education');
}
