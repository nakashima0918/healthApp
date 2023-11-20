<?php
require_once "./DBManager.php"; // DBManagerクラスのファイルを読み込む
session_start();

// DBManagerクラスのインスタンスを作成
$dbManager = new DBManager();

if (!empty($_POST)) {
    $error = array(); // エラーを格納する配列を初期化

    /* 入力情報の不備を検知 */
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <style>
         body {
            background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
            background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        /* ナビゲーションバーの背景色を変更 */
        .navbar {
            background-image: linear-gradient(to right, #0F2027 0%, #203A43 51%, #2C5364 100%);
            background-image: linear-gradient(to right, #11998e 0%, #38ef7d 100%);
            background-color: transparent;
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
<body style="padding-top: 5rem">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">健康アプリ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="4-1-home.html">ホーム</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="5-1-user_info.html">ユーザー</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container registration-container">
        <div class="card registration-card">
            <div class="card-body">
            <div class="registration-header">
              <h2>新規登録</h2>
            </div>    
        <form action="" method="POST">
            <p>当サービスをご利用するために、次のフォームに必要事項をご記入ください。</p>
            <br>

            <div class="control">
                <label for="name">ユーザー名</label>
                <input id="name" class="form-control" type="text" name="name">
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