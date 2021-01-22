<?php
session_start();
require_once 'vendor/connect.php';
if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/ico.jpg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style-user.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Добро пожаловать | В Класс-Клик</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="inner-header">
                <div class="navmenu">
                    <button class="navmenu menubutton">
                        <img src="images/navmenu.png" alt="">
                    </button>
                </div>
                <div class="inner-header-profile">
                   <div class="profileImageFrame">
                        <img class="profileImage" src="images/<?=$_SESSION['user']['id']?>.jpg" alt="">
                    </div>
                    <div class="profileText">
                        <form action="vendor/logout.php">
                        <button class="profile profilebutton">
                        <?=$_SESSION['user']['lastname']?> <?=mb_substr($_SESSION['user']['firstname'], 0, 1); $_SESSION['user']['firstname'];?>.<?=mb_substr($_SESSION['user']['secondname'], 0, 1); $_SESSION['user']['secondname'];?>.
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content">
                    <ul>
                        <li>1. Выбираем учебный предмет.</li>
                        <li>2. Выбираем день недели.</li>
                        <li>3. Загружаем домашнее задание.</li>
                    </ul>
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