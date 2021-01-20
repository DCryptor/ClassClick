<?
session_start();
require_once 'connect.php';

$email = $_POST['email'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$secondname = $_POST['secondname'];
$bday = $_POST['bday'];
$school = $_POST['school'];
$classnumber = $_POST['classnumber'];
$classname = $_POST['classname'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_email) > 0) 
{
    echo ('Такой логин уже существует');
}
if ($email === "")
{
    echo ("Введите email");
}
if ($lastname === "")
{
    echo ("Введите фамилию");
}
if ($firstname === "")
{
    echo ("Введите имя");
}
if ($secondname === "")
{
    echo ("Введите отчество");
}
if ($password === "")
{
    echo ("Введите пароль");
}
if ($password != $passwordConfirm)
{
    echo ("Пароли не совпадают");
}
if ($email != "" and $lastname != "" and $firstname != "" and $secondname !="" and $password != "" and $passwordConfirm != "" and $password === $passwordConfirm)
{
    header ('Location: ../register.html');
   ?> <script>alert ("Регистрация прошла успешно!");</script> <?php
}
?>