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
    <link rel="shortcut icon" href="images/ico.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Добро пожаловать | В Класс-Клик</title>
</head>
<body>
    <div class="wrapper">
    <?php
    if ($_SESSION['message'])
    {?>
        <div id="messageBox" class="messageBox" style="display:block">
        <div class="message"><?=$_SESSION["message"]?></div>
        <button onclick="Hide('messageBox')" name="errorBtn" class="buttonErrorOk">Ок</button></div>
    <?php
    } 
    else 
    {
        unset($_SESSION['message']);
    }
    ?>
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
                    <form class="from-content" action="vendor/login.php" method="POST">
                        <input name="email" class="signin-content" type="email" placeholder="Логин или e-mail">
                        <input name="password" class="signin-content" type="password" placeholder="Пароль">
                        <button name="btn_signIn" class="signin-content" type="submit">Вход</button>
                    </form>
                    <div class="passRecovery"><a class="passRecoveryLink" href="">Забыли пароль?</a></div>
                </div>
                <div class="inner-content2">
                    <div>У вас ещё нет аккаунта? <a class="registrationLink" href="register.php" onclick="<?php unset($_SESSION['message'])?>"> Зарегистрироваться</a></div>
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