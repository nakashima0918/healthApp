<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "./DBManager.php"; // DBManagerクラスのファイルを読み込む
session_start(); // セッションを開始

// ログインが試行された場合
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ユーザーが入力したメールアドレスとパスワードを取得
    $email = $_POST["email"];
    $password = $_POST["password"];

    // DBManagerクラスのインスタンスを作成
  // ...（以前のコード）

// DBManagerクラスのインスタンスを作成
	$dbManager = new DBManager();

// データベースに接続できるかテスト
	$testResult = $dbManager->test();

// データベースにユーザーが存在し、かつパスワードが一致するか確認
	$user = $dbManager->getUserByEmail($email);

	if ($user && password_verify($password, $user['password'])) {
    // パスワードが一致した場合はセッションにユーザーIDを保存し、ホームページにリダイレクト
   	 $_SESSION["user_id"] = $user['id'];
    	header("Location: 4-1-home.html");
    	exit();
    } else {
   	 // ユーザーが存在しないか、パスワードが一致しない場合はエラーメッセージを表示
    	$error_message = "メールアドレスまたはパスワードが正しくありません。";
    }

}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>健康アプリ ログイン</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .login-body {
        overflow-y: scroll; /* 垂直方向のスクロールを有効にする */
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

<body class="login-body">
<header class="page-header wrapper">
        <h1><a href="4-1-home.html"><img class="logo" src="img/logo1.png" alt="ロゴ"></a></h1>
            <nav>
                <ul class="main-nav">
                    <li><a href="9-1-logout.html">rogout</a></li>
                    <li class="grayout">user</li>
                </ul>
            </nav>
    </header>

    <div class="container login-container">
        <div class="card login-card">
            <div class="card-body">
                <div class="login-header">
                    <h2>ログイン</h2>
                </div>
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form class="login-form" action="" method="post">
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレスを入力してください">
                    </div>
                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="パスワードを入力してください">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">ログイン</button>
                </form>
                <div class="login-link">
                    <a href="2-1-new_user.php">新規登録</a><br>
                    <a href="3-1-reset_pass.html">パスワードを忘れた場合</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
