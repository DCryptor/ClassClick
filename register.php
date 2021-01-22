<?php
session_start();
require_once 'vendor/connect.php';
if ($_SESSION['user']) {
    header('Location: user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/ico.jpg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
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
                <div class="inner-content">
                    <div class="inner-content-title">Класс-Клик</div>
                    <form class="from-content" action="vendor/register.php" method="POST">
                        <input name="email" class="signin-content" type="email" placeholder="E-mail">
                        <input name="lastname" class="signin-content" type="text" placeholder="Фамилия">
                        <input name="firstname" class="signin-content" type="text" placeholder="Имя">
                        <input name="secondname" class="signin-content" type="text" placeholder="Отчество">
                        <input name="bday" class="signin-content date" type="date" value="2000-01-01">
                        <select name="school" class="signin-content" id="">
                            <option value="МБОУ Вилюйская НОШ №1">МБОУ "Вилюйская НОШ №1"</option>
                            <option value="МБОУ Вилюйская НОШ №2">МБОУ "Вилюйская НОШ №2"</option>
                            <option value="МБОУ Вилюйская СОШ №1">МБОУ "Вилюйская СОШ №1"</option>
                            <option value="МБОУ Вилюйская СОШ №2">МБОУ "Вилюйская СОШ №2"</option>
                            <option value="МБОУ Вилюйская СОШ №3">МБОУ "Вилюйская СОШ №3"</option>
                            <option value="МБОУ Вилюйская гимназия">МБОУ "Вилюйская гимназия"</option>
                        </select>
                        <input name="classnumber" class="signin-content" type="number" min="1" max="11" placeholder="Класс">
                        <select name="classname" class="signin-content" id="">
                            <option value="а">a</option>
                            <option value="б">б</option>
                            <option value="в">в</option>
                            <option value="г">г</option>
                        </select>
                        <input name="password" class="signin-content" type="password" placeholder="Пароль">
                        <input name="passwordConfirm" class="signin-content" type="password" placeholder="Подтверждение пароля">
                        <button class="signin-content" type="submit">Регистрация</button>
                    </form>
                    <div class="passRecovery"><a class="passRecoveryLink" href="">Регистрируясь, вы принимаете наши Условия, Политику использования данных и Политику в отношении файлов cookie.</a></div>
                </div>
                <div class="inner-content2">
                    <div>Есть аккаунт? <a class="registrationLink" href="index.php">Войти</a></div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="inner-footer">
                <div>
                    <div class="footer-title">
                        Команда "Олимп" МБУ ДО ИТЦ "Кэскил" им.Н.И.Протопоповой <br>
                        г.Вилюйск, 2021г.
                    </div>   
                </div>
            </div>
        </div>
    </div>
</body>
</html>