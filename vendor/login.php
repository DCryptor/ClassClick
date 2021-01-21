<?php
session_start();
require_once 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$admin = 0;
$btn_signIn = $_POST['btn_signIn'];

if (isset($btn_signIn))
{
$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_email) > 0) 
{
    $user = mysqli_fetch_assoc($check_email);		
    $_SESSION['user'] = ["id" => $user['id'],
    "email" => $user['email'],
    "lastname" => $user['lastname'],
    "firstname" => $user['firstname'],
    "secondname" => $user['secondname'],
    "bday" => $user['bday'],
    "school" => $user['school'],
    "classnumber" => $user['classnumber'],
    "classname" => $user['classname'],
    "password" => $user['password'],
    "admin" => $user['admin'],
    ];
    $hash = $_SESSION['user']['password'];
    if (password_verify($password,$hash))
    {   
        header('Location: ../user.php');
        echo('Вход выполнен!');
    }
    else
    {
        echo('Неверный пароль!');
    }
} 
else 
{
    echo ('Такой пользователь не зарегистрирован!');
}
}
?>