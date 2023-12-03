<?php
session_start();
// require_once './DBManager.php';
// $dbmng = new DBManager();
// $userInfo = $dbmng->userInfoGet($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>情報変更入力</title>
     <!-- css -->
     <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
     <link href="https:fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">
     <!-- アイコン -->
     <link rel="icon" type="igm/jpg" href="img/logo1.png">
     <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="user_chg">
    <header class="page-header wrapper">
        <h1><a href="4-1-home.html"><img class="logo" src="img/logo1.png" alt="ロゴ"></a></h1>
        <nav>
            <ul class="main-nav">
                <li><a href="9-1-logout.html">rogout</a></li>
                <li class="grayout">user</li>
            </ul>
        </nav>
    </header>


    <button class="backb" type="button" onclick="history.back()">戻る＞</button>

    <h2>ユーザー情報変更</h2>
    <br>
    <!-- エラー表示 -->
    <?php
        if ($_SESSION['error'] != "") {
          echo '<div class="error">';
          echo $_SESSION['error'];
          echo '</div>';
        }
    ?>
    <form action='5-6-user_chk.php' method="POST">
        <div class="fild">
            <input type="text" placeholder="ユーザー名" maxlength="20" name="name"><br>
        </div>
        <div class="fild">
            <input type="text" placeholder="メールアドレス" maxlength="30" name="mail"><br>
        </div>
        <div class="fild">
            <input type="text" placeholder="パスワード" maxlength="15" name="pass1"><br>
        </div>
        <div class="fild">
            <input type="text" placeholder="確認用パスワード" maxlength="15" name="pass2"><br>
        </div>
        <div class="fild">
            <input type="text" placeholder="目標運動量" maxlength="7" name="motion"><br>
        </div>
        <div class="fild">
            <input type="text" placeholder="目標カロリー" maxlength="4" name="calorie"><br>
        </div>
        <!-- <a class="s-button" href="5-3-user_chk.php">確認に進む</a> -->
        <input type="submit" class="s-button" value="確認に進む">
    </form>
    
        
</body>
</html>