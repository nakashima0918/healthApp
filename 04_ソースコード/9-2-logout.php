<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト完了画面</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body id="logout">
<header class="page-header wrapper">
        <h1><a href="4-1-home.html"><img class="logo" src="img/logo1.png" alt="ロゴ"></a></h1>
        <nav>
            <ul class="main-nav">
                <li class="grayout">ログアウト</li>
                <li class="grayout">ユーザー</li>
            </ul>
        </nav>
    </header>
    <div class="big-bg">
        <h2>ログアウトしました</h2>
        <a class="s-button" href="1-1-login.php">ログイン画面へ</a>
    </div>
</body>
</html>