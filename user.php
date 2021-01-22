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
        <a class="menuHide" onclick="Hide('profileMenu');Hide('subjects');"></a>
        <div class="header">
            <div class="inner-header">
                <div class="navmenu">
                    <a href="javascript:void(0)" class="profile profilebutton" onclick="showHide('subjects')" class="navmenu menubutton">
                        <img src="images/navmenu.png" alt="">
                    </a>
                </div>
                <div class="inner-header-profile">
                   <div class="profileImageFrame">
                        <img class="profileImage" src="images/<?=$_SESSION['user']['id']?>.jpg" alt="">
                    </div>
                    <div class="profileText">
                        <form action="">
                        <a href="javascript:void(0)" class="profile profilebutton" onclick="showHide('profileMenu')">
                        <?=$_SESSION['user']['lastname']?> <?=mb_substr($_SESSION['user']['firstname'], 0, 1); $_SESSION['user']['firstname'];?>.<?=mb_substr($_SESSION['user']['secondname'], 0, 1); $_SESSION['user']['secondname'];?>.
                        </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="subjects" class="subjectsMenuBlock">
                <ul class="subjectMenu">
                    <li class="subjectMenu"><a class="subjectMenuLink">Математика</a></li>
                </ul>
            </div>
            <div id="profileMenu" class="profileMenuBlock">
                <ul>
                    <li><button onclick="Hide('profileMenu')" class="profileMenuBtn">Открыть профиль</button></li>
                    <li><button onclick="Hide('profileMenu')" class="profileMenuBtn">Одноклассники</button></li>
                    <li><button onclick="Hide('profileMenu')" class="profileMenuBtn">Учителя</button></li>
                    <li><form onclick="Hide('profileMenu')" action="vendor/logout.php"><button class="profileMenuBtn">Выйти</button></form></li>
                </ul>
            </div>
            <div class="content">
                <div class="tutorialBlock">
                    <div class="tutorial headText1">Единая система домашних заданий</div>
                    <div class="tutorial headText2">Класс-Клик</div>
                    <div class="tutorialNumber">1</div>
                   <div class="tutorial tutTitle">Выбрать учебный предмет.</div>
                   <div class="tutorialNumber">2</div>
                   <div class="tutorial tutTitle">Выбрать день недели.</div>
                   <div class="tutorialNumber">3</div>
                   <div class="tutorial tutTitle">Загрузить выполненную домашнюю работу.</div>
                </div>
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
    <script src="assets/js/main.js"></script>
</body>
</html>