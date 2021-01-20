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
$admin = 0;

$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_email) > 0) 
{
    echo ('Такой пользователь уже зарегистрирован');
}
else 
{
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
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `users` (`id`, `email`, `lastname`, `firstname`, `secondname`, `bday`, `school`, `classnumber`, `classname`, `password`, `admin`) VALUES (NULL, '$email', '$lastname', '$firstname', '$secondname', '$bday', '$school', '$classnumber', '$classname', '$hash', '$admin')";
        mysqli_query ($connect,$sql);
        //header ('Location: ../register.html');
        echo ("<SCRIPT LANGUAGE='JavaScript'> window.alert('Succesfully Registered'); window.location.href='../index.html'; </SCRIPT>");
    }   
}
?>