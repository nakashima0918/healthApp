<?php
require_once "./DBManager.php";
session_start();

$_SESSION['error'] = "";
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード再設定 確認</title>
    <!-- css -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="https:fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- アイコン -->
    <link rel="icon" type="igm/jpg" href="img/logo1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="reset_pass_chk">
<header class="page-header wrapper">
        <h1><img class="logo" src="img/logo1.png" alt="ロゴ"></h1>
        <nav>
            <ul class="main-nav">
                <li><a href="2-1-new_user.php">新規登録</a></li>
                <li><a href="1-1-login.php">ログイン</a></li>
            </ul>
        </nav>
    </header>

    <button class="backb" type="button" onclick="history.back()">戻る＞</button>

    <h2>こちらの内容で間違いありませんか？</h2>
    <p>パスワード : <?php echo $_SESSION['input_pass'];?></p>
    <a class="s-button" href="3-4-reset_pass_com.html">変更する</a>
</body>
</html>