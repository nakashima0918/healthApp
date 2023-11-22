<?php
require_once "./DBManager.php";
session_start();

$_SESSION['mail'] = $_POST['mail'];

//$email = $_SESSION['join']['email'];


?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード再設定 入力</title>
    <!-- css -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="https:fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- アイコン -->
    <link rel="icon" type="igm/jpg" href="img/logo1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="reset_pass">
    <header class="page-header wrapper">
        <h1><a href="4-1-home.php"><img class="logo" src="img/logo1.png" alt="ロゴ"></a></h1>
        <nav>
            <ul class="main-nav">
                <li><a href="1-1-login.php">rogin</a></li>
                <li class="grayout">user</li>
            </ul>
        </nav>
    </header>

    <button class="backb" type="button" onclick="history.back()">戻る＞</button>

    <h2>パスワードを変更する</h2>

    <!-- エラー表示 -->
    <?php
        if ($_SESSION['error'] != "") {
          echo '<div class="error">';
          echo $_SESSION['error'];
          echo '</div>';
        }
    ?>
    <form action='3-6-reset_pass_chk.php' method="POST">
        <div class="fild">
            <input type="password" placeholder="パスワード" name="pass1"><br>
        </div>
        <div class="fild">
            <input type="password" placeholder="確認用パスワード" name="pass2"><br>
        </div>
        <!-- <a class="s-button" href="3-3-reset_pass_chk.php">変更する</a> -->
        <input type="submit" value="変更する">
    </form>
    

</body>
</html>