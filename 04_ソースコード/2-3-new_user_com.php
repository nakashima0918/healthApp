<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録完了</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .success-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success-card {
            max-width: 400px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* 背景色を変更 */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .success-header {
            text-align: center;
        }

        .success-header h2 {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #c7ecee; /* 明るい青緑色の背景 */
            color: #333; /* テキストカラーをダークグレーに設定 */
        }
    </style>
</head>
<body>
    <header class="page-header wrapper">
        <h1><a href="4-1-home.html"><img class="logo" src="img/logo1.png" alt="ロゴ"></a></h1>
            <nav>
                <ul class="main-nav">
                    <li><a href="9-1-logout.html">rogout</a></li>
                    <li class="grayout">user</li>
                </ul>
            </nav>
    </header>

    <div class="container success-container">
        <div class="card success-card">
            <div class="card-body">
                <div class="success-header">
                    <h2>新規登録完了</h2>
                </div>
                <a href="1-1-login.php" class="btn btn-primary btn-block">ログイン</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
