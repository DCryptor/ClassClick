<?php
session_start();
require_once 'vendor/connect.php';
if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>
<!-- Отключаем туториал блок!-->
<?php
    if ($_GET['subject_id'] != "")
    {
        $contentBlock = "display:none";
        $subjectContentBlock = "display:block";
    }
    else 
    {
        $subjectContentBlock = "display:none";
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
                    <a href="javascript:void(0)" class="profile profilebutton" onclick="showHide('subjects'); Hide('profileMenu');" class="navmenu menubutton">
                        <img src="images/navmenu.png" alt="">
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
                $my_class = $_SESSION['user']['classnumber'];
                $subjects_class = mysqli_query($connect, "SELECT * FROM `subjects` WHERE `class` = '$my_class'");
                if (mysqli_num_rows($subjects_class) > 0) 
                {
                $subjects = mysqli_fetch_all($subjects_class, MYSQLI_ASSOC);
                foreach ($subjects as $subject) 
                {
                ?> 
                    <li class="subjectMenu"><a href="?<?= http_build_query(array_merge($_GET, ['user_id' => $_SESSION['user']['id']],['subject_id' => $subject['id']])); ?>" class="subjectMenuLink">▪ <?=$subject['subject']?></a></li>
                <?php
                }
                }
                ?>
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
            <div class="content" style="<?=$contentBlock?>">
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
            <!-- Блок предметов -->
            <div class="content_subject" style="<?=$subjectContentBlock?>">
                <div  class="subject_block">
                <div class="subjectTitle">
                <?php
                 $my_subject = $_GET['subject_id'];
                 $subjects_id = mysqli_query($connect, "SELECT * FROM `subjects` WHERE `id` = '$my_subject'");
                if (mysqli_num_rows($subjects_id) > 0) 
                {
                $subject_id = mysqli_fetch_all($subjects_id, MYSQLI_ASSOC);
                foreach ($subjects_id as $subject_id) 
                {
                    echo $subject_id['subject'];
                }
                }
                ?></div>
                <div class="content_subject_elements">
                    <form method="POST" enctype="multipart/form-data">
                    <input name="fileData" class="uploadElement" type="date">
                    <input name="userFiles" class="uploadElement fileupload" type="file" multiple>
                    <button name="uploadBtn" class="uploadElement" type="submit">Загрузить</button>
                    </form>     
                </div>
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
<?php
    $name = time().$_FILES['userFiles']['name'];
    $tmp_name = $_FILES['userFiles']['tmp_name'];
    $id_user = $_SESSION['user']['id'];
    $id_subject = $_GET['subject_id'];
    $data = $_POST['fileData'];
    $class = $_SESSION['user']['classnumber'];
    $path = "uploads/$id_user/$id_subject/$data/";
    $pathName = "uploads/$id_user/$id_subject/$data/$name";
    $uploadButton = $_POST['uploadBtn'];
    
    if (isset($uploadButton))
    {
        if (is_dir($path))
        {
            if (!move_uploaded_file($tmp_name,$pathName))
            {
                echo "File is not uploaded!";
            } 
            else
            {
                mysqli_query ($connect, "INSERT INTO `uploads`(`id`, `user_id`, `subject_id`, `class`, `date`, `path`) VALUES (NULL, '$id_user', '$id_subject', '$class', '$data', '$pathName')");
            }
        }
        else 
        {
            mkdir($path, 0755, true);
            if (!move_uploaded_file($tmp_name,$pathName))
            {
                echo "File is not uploaded!";
            } 
            else
            {
                mysqli_query ($connect, "INSERT INTO `uploads`(`id`, `user_id`, `subject_id`, `class`, `date`, `path`) VALUES (NULL, '$id_user', '$id_subject', '$class', '$data', '$pathName')");
            }
        }
    }
?>