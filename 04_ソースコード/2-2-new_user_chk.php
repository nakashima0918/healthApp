<?php
require_once "./DBManager.php";
session_start();

/* 会員登録の手続き以外のアクセスを飛ばす */
if (!isset($_SESSION['join'])) {
    header('Location: 2-1-new_user_chk.php');
    exit();
}

$db = new DBManager();

if (!empty($_POST['check'])) {
    // パスワードを暗号化
    $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);

    // ユーザー情報をデータaベースに登録
    $name = $_SESSION['join']['name'];
    $email = $_SESSION['join']['email'];

    // 登録が成功した場合の処理
    if ($db->registerUser($name, $email, $hash)) {
        unset($_SESSION['join']);   // セッションを破棄
        header('Location: 2-3-new_user_com.php');   // 2-3-new_user_com.phpへ移動
        exit();
    } else {
        $error = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>確認画面</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .new_user-body{
         overflow-y: scroll; /* 垂直方向のスクロールを有効にする */
        }

        .registration-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* 背景色を変更 */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .registration-card h2 {
            margin-bottom: 20px;
        }
        
        .btn-primary {
            background-color: #c7ecee; /* 明るい青緑色の背景 */
            color: #333; /* テキストカラーをダークグレーに設定 */
        }
    </style>
</head>
<body class="new_user-body">
    <header class="page-header wrapper">
        <h1><a href="4-1-home.html"><img class="logo" src="img/logo1.png" alt="ロゴ"></a></h1>
            <nav>
                <ul class="main-nav">
                    <li><a href="9-1-logout.html">rogout</a></li>
                    <li class="grayout">user</li>
                </ul>
            </nav>
    </header>

    <div class="container mt-5">
        <div class="card registration-card">
            <div class="card-body">
          <form action="" method="POST">
            <input type="hidden" name="check" value="checked">
            <h3>入力情報の確認</h3>
            <p>ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <p>登録情報はあとから変更することもできます。</p>
            <?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊会員登録に失敗しました。</p>
            <?php endif ?>
            <hr>

            <div class="control">
                <p>ユーザ名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?></span></p>
            </div>

            <div class="control">
                <p>メールアドレス</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES); ?></span></p>
            </div>
            
            <br>
            <a href="2-1-new_user.php" class="btn btn-secondary">変更する</a>
            <button type="submit" class="btn btn-primary">登録する</button>
            <div class="clear"></div>
        </form>
        </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>