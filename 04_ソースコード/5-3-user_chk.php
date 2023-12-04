<?php
session_start();
// require_once './DBManager.php';
// $dbmng = new DBManager();
// $userInfo = $dbmng->userInfoGet($_SESSION['user_id']);

// $mail;
// $pass;
// $name;

// foreach ($userInfo as $row) {
//   $mail = $row['mail_address'];
//   $pass = $row['input_pass'];
//   $name = $row['user_name'];
//}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報 確認</title>
     <!-- css -->
     <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
     <link href="https:fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">
     <!-- アイコン -->
     <link rel="icon" type="igm/jpg" href="img/logo1.png">
     <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="user_chk">
    <div class="big-bg">
    <header class="page-header wrapper">
        <h1><a href="4-1-home.html"><img class="logo" src="img/logo1.png" alt="ロゴ"></a></h1>
        <nav>
            <ul class="main-nav">
                <li><a href="9-1-logout.html">ログアウト</a></li>
                <li class="grayout">ユーザー</li>
            </ul>
        </nav>
    </header>

        <h2>こちらの内容で間違いありませんか</h2>
        <button class="backb" type="button" onclick="history.back()">戻る＞</button>
        <div class="adjustment">
            <p>ユーザー名 : <?php echo $_SESSION['name'];?></p>
        </div>
        <div class="adjustment">
            <P>メールアドレス : <?php echo $_SESSION['mail'];?></P>
        </div>
        <div class="adjustment">
            <p>パスワード : <?php echo $_SESSION['input_pass'];?></p>
        </div>
        <div class="adjustment">
            <p>目標運動量 : <?php echo $_SESSION['motion'];?></p>
        </div>
        <div class="adjustment">
            <p>目標カロリー : <?php echo $_SESSION['calorie'];?></p>
        </div>
        <!-- <a class="s-button" href="5-4-user_com.html">変更する</a> -->
        
        <input type="submit" class="s-button" onclick="location.href='5-7-user.php'" value="変更する">
    </div>
    
</body>
</html>