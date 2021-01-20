<?
    session_start();
    require_once 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$admin = 0;

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0) 
{
    echo ('Такой пользователь уже зарегистрирован');
}
?>