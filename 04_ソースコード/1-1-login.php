<?php
session_start();

$_SESSION['error'] = "";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>健康アプリ ログイン</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
            background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        /* ナビゲーションバーの背景色を設定 */
        .navbar {
            background-image: linear-gradient(to right, #0F2027 0%, #203A43 51%, #2C5364 100%);
            background-image: linear-gradient(to right, #11998e 0%, #38ef7d 100%);
            background-color: transparent;
            margin-bottom: 0; /* 下部の余白を削除 */
        }

        .login-container {
            margin-top: 5rem; /* 上部の余白を調整 */
        }

        .login-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
        }

        .login-header h2 {
            margin-bottom: 20px;
        }

        .login-form {
            text-align: left;
        }

        .login-form .form-group {
            margin-bottom: 15px;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #333; /* テキストカラーをダークグレーに設定 */
        }

        .btn-primary {
            background-color: #c7ecee; /* 明るい青緑色の背景 */
            color: #333; /* テキストカラーをダークグレーに設定 */
        }
    </style>
</head>

<body>
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
                    <a class="nav-link" href="1-1-login.html">ログイン</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container login-container">
        <div class="card login-card">
            <div class="card-body">
                <div class="login-header">
                    <h2>ログイン</h2>
                </div>
                <form class="login-form" action="4-1-home.html" method="post">
                    <div class="form-group">
                        <label for="username">ユーザー名</label>
                        <input type="text" class="form-control" id="username" placeholder="ユーザー名を入力してください">
                    </div>
                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="password" class="form-control" id="password" placeholder="パスワードを入力してください">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">ログイン</button>
                </form>
                <div class="login-link">
                    <a href="2-1-new_user.php">新規登録</a><br>
                    <a href="3-1-reset_pass_uchk.php">パスワードを忘れた場合</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
