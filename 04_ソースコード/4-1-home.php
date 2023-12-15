<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <style>
        body {
            height: 100vh; /* ビューポートの高さに対して100% */
            overflow-y: scroll; /* 縦方向のスクロールを有効にする */
         }

         .full-screen-image {
            width: 100%;
            height: auto; /* 高さを自動調整してアスペクト比を維持 */
            max-height: 60vh; /* 高さの最大値を指定 */
            object-fit: cover;
        }

        .link-container {
            display: flex;
            flex-wrap: wrap;
            justify-content:flex-start;
            align-items: center;
            margin-top: 20px;
        }

        .link-container a {
            text-decoration: none;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #333;
            display: block;
            text-align: center;
            transition: background-color 0.3s ease;
            background-color: #f0f0f0;
            width: 100%;
            box-sizing: border-box; 
        }

        .link-container a:hover {
            background-color: #f0f0f0;
            color: #0066cc; /* ホバー時の文字色を変更 */
        }

    </style>
</head>

<body>
    <header class="page-header wrapper">
        <h1><a href="4-1-home.html"><img class="logo" src="img/logo1.png" alt="ロゴ"></a></h1>
        <nav>
            <ul class="main-nav">
                <li><a href="9-1-logout.html">ログアウト</a></li>
                <li><a href="5-1-user_info.php">ユーザー</a></li>
            </ul>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <img src="img/home.png" alt="ホーム" class="full-screen-image">
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-md-4 mb-3 link-container">
                <a href="8-1-motion.html"><h3>運動量計算</h3></a>
            </div>
            <div class="col-md-4 mb-3 link-container">
                <a href="7-1-nutrition.html"><h3>栄養トラッカー</h3></a>
            </div>
            <div class="col-md-4 mb-3 link-container">
                <a href="6-1-recipe_list.html"><h3>健康レシピ</h3></a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>