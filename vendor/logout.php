<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['message']);
/*unset($_SESSION['message2']);*/
header('Location: ../index.php');
