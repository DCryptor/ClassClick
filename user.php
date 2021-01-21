<?php
session_start();
require_once 'vendor/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style-user.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Добро пожаловать | В Класс-Клик</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="inner-header">
                <div class="inner-header-title">
                    Единая система домашних заданий
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content">
                <div class="user-content">
                    <p class="userData">Информация пользователя:</p>
                    <p class="userData">
                    <?=$_SESSION['user']['email'];?> </p>
                    <p class="userData">
                    <?=$_SESSION['user']['lastname'];?>
                    <?=$_SESSION['user']['firstname'];?>
                    <?=$_SESSION['user']['secondname'];?></p>
                    <p class="userData">
                    <?=$_SESSION['user']['bday'];?> </p>
                    <p class="userData">
                    <?=$_SESSION['user']['school'];?> </P>
                    <p class="userData">
                    <?=$_SESSION['user']['classnumber'];?>
                    <?=$_SESSION['user']['classname'];?> </p>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="inner-footer">
                    <div class="footer-title">
                        Команда "Олимп" МБУ ДО ИТЦ "Кэскил" им.Н.И.Протопоповой <br>
                        г.Вилюйск, 2021г.
                    </div>   
            </div>
        </div>
    </div>
</body>
</html>