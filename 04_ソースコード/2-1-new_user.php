<?php
require_once "./DBManager.php"; // DBManagerクラスのファイルを読み込む
session_start();

// DBManagerクラスのインスタンスを作成
$dbManager = new DBManager();

if (!empty($_POST)) {
    $error = array(); // エラーを格納する配列を初期化

    /* 入力情報の不備を検知 */
    if (empty($_POST['name'])) {
        $error['name'] = "blank";
    }

    if (empty($_POST['email'])) {
        $error['email'] = "blank";
    }
    if (empty($_POST['password'])) {
        $error['password'] = "blank";
    }

    // メールアドレスの重複を検知
    if (empty($error)) {
        $email = $_POST['email'];

        // DBManagerクラスを使用してメールアドレスの重複をチェック
        $isDuplicate = $dbManager->checkEmailDuplicate($email);

        if ($isDuplicate) {
            $error['email'] = 'duplicate';
        }
    }

    /* エラーがなければ次のページへ */
    if (empty($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: 2-2-new_user_chk.php');   // check.phpへ移動
        exit();
    }
}
?>
<!-- 以下は画面の表示部分のコード -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>アカウント作成</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <style>
        .new_user-body{
         overflow-y: scroll; /* 垂直方向のスクロールを有効にする */
        }

        .registration-container {
            margin-top: 5rem;
        }

        .registration-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .registration-header {
            text-align: center;
        }

        .registration-header h2 {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #c7ecee; /* 明るい青緑色の背景 */
            color: #333; /* テキストカラーをダークグレーに設定 */
        }

        .error {
        color: #d60e0e;
        font-size: 60%;
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

    <div class="container registration-container">
        <div class="card registration-card">
            <div class="card-body">
            <div class="registration-header">
              <h2>新規登録</h2>
            </div>    
        <form action="" method="POST">
           
            <br>

            <div class="control">
                <label for="name">ユーザー名</label>
                <input id="name" class="form-control" type="text" name="name">
                <?php if (!empty($error["name"]) && $error['name'] === 'blank'): ?>
                <p class="error">＊ユーザー名を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="email">メールアドレス</label>
                <input id="email" class="form-control" type="email" name="email">
                <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                    <p class="error">＊メールアドレスを入力してください</p>
                <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
                    <p class="error">＊このメールアドレスはすでに登録済みです</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="password">パスワード</label>
                <input id="password" class="form-control" type="password" name="password">
                <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
                    <p class="error">＊パスワードを入力してください</p>
                <?php endif ?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block">登録</button>
        </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>