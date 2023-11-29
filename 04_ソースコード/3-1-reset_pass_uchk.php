<?php
//require_once "./DBManager.php";
session_start();

//$dbManager = new DBManager();

// POSTリクエストからユーザーとパスを取得
$username_input = $_POST['username'];
$password_input = $_POST['password'];

if (!empty($_POST)) {
    // エラーを格納する配列を初期化
    $error = array(); 

    // 未入力チェック
    if (empty($_POST['password'])) {
        $error['password'] = "blank";
    }

    // 未入力がないか
    if (empty($error)) {
        $_SESSION['join'] = $_POST;
        header('Location: 3-2-reset_pass.php');
        exit();
    }
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード再設定 ユーザー確認</title>
    <!-- css -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="https:fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- アイコン -->
    <link rel="icon" type="igm/jpg" href="img/logo1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="reset_pass_uchk">
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

    <div class="big-bg" class="reset_pass">
        <h2>パスワードを忘れた</h2>
        <h3>メールアドレスを入力してください</h3>

        <div class="error-container">
            <!-- エラー表示 -->
            <?php
                if ($_SESSION['error'] != "") {
                echo '<div class="error">';
                echo $_SESSION['error'];
                echo '</div>';
                }
            ?>
        </div>

        <form action='3-8-reset_pass_adchk.php' method ='POST'>
        <div class="fild">
            <input type="text" placeholder="メールアドレス" maxlength="30" name = "mail"><br>
        </div>
        <!-- <a class="s-button" href="3-2-reset_pass.php">リセットする</a> -->
        <input type="submit" class="s-button" value="リセットする">
        </form>
    </div>
    
</body>
</html>