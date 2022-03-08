<?php
    session_start();
    if(empty($_SESSION)){
        if ( !empty($_COOKIE['login']) and !empty($_COOKIE['key']) ) {
            // echo $_COOKIE['login'];
        }
    }
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <?php require_once 'components/nav.php'; ?>
<?php

    if(in_array($_GET['querysystemurl'], ['products', 'register', 'auth', 'cart'])){
        include_once "views/$_GET[querysystemurl].php";
    }
    ?>
    <h2 class=""><?= !empty($_SESSION['auth']) ? $_SESSION['login'] : 'Вы не авторизованы' ?></h2>

</body>
</html>

