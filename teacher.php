<?php
session_start();
require_once 'vendor/connect.php';
if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>
<?php
    if ($_GET['scoolselect'] != "" and $_GET['classname'] != "" and $_GET['subject'] != "")
    {
        $contentBlock = "display:none";
        $subjectContentBloc = "display:block";
        $subjectContentBlocs = "display:flex";
    }
    else 
    {
        $subjectContentBloc = "display:none";
        $subjectContentBlocs = "display:none";
        $contentBlock = "display:block";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/ico.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style-user.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Добро пожаловать | В Класс-Клик</title>
</head>
<body>
    <div class="wrapper">
        <a class="menuHide" onclick=""></a>
        <div class="header">
            <div class="inner-header">
                <div class="navmenu">
                    <a style="<?=$subjectContentBlocs?> href="javascript:void(0)" class="profile profilebutton" onclick="showHide('subjects'); Hide('profileMenu');" class="navmenu menubutton">
                        <img style="<?=$subjectContentBlocs?>" src="images/navmenu.png" alt="">
                    </a>
                </div>
                <div class="inner-header-profile">
                   <div class="profileImageFrame">
                        <img class="profileImage" src="images/<?=$_SESSION['user']['id']?>.jpg" alt="">
                    </div>
                    <div class="profileText">
                        <form action="">
                        <a href="javascript:void(0)" class="profile profilebutton" onclick="showHide('profileMenu'); Hide('subjects');">
                        <?=$_SESSION['user']['lastname']?> <?=mb_substr($_SESSION['user']['firstname'], 0, 1); $_SESSION['user']['firstname'];?>.<?=mb_substr($_SESSION['user']['secondname'], 0, 1); $_SESSION['user']['secondname'];?>. ▼
                        </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Блок выбора предметов -->
        <div class="row">
            <div class="subjectsOverflow">
                <div id="subjects" class="subjectsMenuBlock">
                <ul class="subjectMenu">
                <?php
                    $myclassselect = $_GET['scoolselect'];
                    $myclassnameselect = $_GET['classname'];
                    $nameShkola = $_SESSION['user']['school'];
                    $isUchenik = "0";
                    $userSelect = mysqli_query($connect, "SELECT * FROM `users` 
                    WHERE `admin` = '$isUchenik' 
                    AND `classname` = '$myclassnameselect' 
                    AND `school` = '$nameShkola' 
                    AND `classnumber` = '$myclassselect'");
                    if (mysqli_num_rows($userSelect) > 0) 
                    {
                    $usersSelect = mysqli_fetch_all($userSelect, MYSQLI_ASSOC);
                    foreach ($usersSelect as $ucheniki) 
                        {
                        ?> 
                        <li class="subjectMenu"><a class="subjectMenuLink2" href="?<?= http_build_query(array_merge($_GET, ['user_id' => $ucheniki['id']])); ?>"><?=$ucheniki['lastname']?> <?=$ucheniki['firstname']?> <?=$ucheniki['secondname']?></a></li>
                        <?php
                        }
                    }
                ?>
                <li><a class="subjectMenuLink2" href="teacher.php">Назад</a></li>
                </ul>
                </div>
            </div>
            <div id="profileMenu" class="profileMenuBlock">
                <ul>
                    <li><button onclick="Hide('profileMenu')" class="profileMenuBtn">Мой профиль</button></li>
                    <li><button onclick="Hide('profileMenu')" class="profileMenuBtn">Второе меню</button></li>
                    <li><button onclick="Hide('profileMenu')" class="profileMenuBtn">Третье меню</button></li>
                    <li><form onclick="Hide('profileMenu')" action="vendor/logout.php"><button class="profileMenuBtn">Выйти</button></form></li>
                </ul>
            </div>
            <!-- Блок туториал -->
            <form action="" method="GET">
            <div class="content-school" style="<?=$contentBlock?>">
            <div class="subjectTitl">Выберите класс и предмет</div>
                <select name="scoolselect" id="">
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                </select>
                <select name="classname" id="">
                    <option value="а">а</option>
                    <option value="б">б</option>
                    <option value="в">в</option>
                    <option value="г">г</option>
                </select>
                <select name="subject" id="">
                <?php
                    $my_class = $_SESSION['user']['classnumber'];
                    $subjects_class = mysqli_query($connect, "SELECT * FROM `subjects` WHERE `class` = '$my_class'");
                    if (mysqli_num_rows($subjects_class) > 0) 
                    {
                    $subjects = mysqli_fetch_all($subjects_class, MYSQLI_ASSOC);
                    foreach ($subjects as $subject) 
                        {
                        ?> 
                        <option class="subjectMenu" value="<?=$subject['id']?>"><a href="?<?= http_build_query(array_merge($_GET, ['user_id' => $_SESSION['user']['id']],['subject_id' => $subject['id']])); ?>" class="subjectMenuLink">▪ <?=$subject['subject']?></a></option>
                        <?php
                        }
                    }
                 ?>
                </select>
                <button class="selectBtn">Выбрать</button>
            </div>
            </form>
            <!-- Блок предметов -->
                <div class="usersBlock">
                <!--select name="userSelect" id=""-->
                <?php
                    $fUserID = $_GET['user_id'];
                    $fSubjectID = $_GET['subject'];
                    $fClassID = $_GET['scoolselect'];

                    $uploadFiles = mysqli_query($connect, "SELECT * FROM `uploads` 
                    WHERE `user_id` = '$fUserID' 
                    AND `subject_id` = '$fSubjectID' 
                    AND `class` = '$fClassID'");
                    if (mysqli_num_rows($uploadFiles) > 0) 
                    {
                    $files = mysqli_fetch_all($uploadFiles, MYSQLI_ASSOC);
                    foreach ($files as $uFiles) 
                        {
                        ?> 
                        <div style="font-size: 20px; padding: 8px; border-bottom: 1px solid grey;"><a href="<?=$uFiles['path']?>">* Задание от <?=date('d.m.Y',strtotime($uFiles['date']))?></a></div>
                        <?php
                        }
                    }
                ?>
                <!--/select-->
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
