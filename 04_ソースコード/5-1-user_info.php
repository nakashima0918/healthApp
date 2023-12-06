<?php
//require_once "./DBManager.php";
session_start();

$_SESSION['error'] = "";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_info</title>
    <!-- css -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="https:fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- アイコン -->
    <link rel="icon" type="igm/jpg" href="img/logo1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="user_info">
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
        <div class="wrapper">
            <h2 class="page-title">user_information</h2>
        </div>
        <div class="info-contents wrapper">
            <article>
                <!--ここから-->
                <!-- <p>ユーザー名　　　: 〇〇 〇〇</p>
                <p>メールアドレス 　:〇〇〇〇@icloud.com</p>
                <p>パスワード　　　: ＊＊＊＊＊＊＊</p>
                <p>目標運動量 : ******</p>
                <p>目標カロリー : ****</p> -->
                <p>ユーザー名 : <?php echo $_SESSION['name'];?></p>
                <p>メールアドレス : <?php echo $_SESSION['mail'];?></p>
                <p>パスワード : <?php echo $_SESSION['input_pass'];?></p>
                <p>目標運動量 : <?php echo $_SESSION['motion'];?></p>
                <p>目標カロリー : <?php echo $_SESSION['calorie'];?></p>

                <header class="post-info">
                    <a class="s-button" href="5-2-user_chg.php">ユーザー情報の変更</a>
                    <!-- <p class="post-cat">みんなが投稿したレシピの紹介</p> -->
                    <!-- <input type="submit" class="s-button" value="リセットする"> -->
                </header>
                
            </article>

            <aside>
                <!--サイドバー部分-->
                <h3 class="sub-title">一覧の表示</h3>
                <ul class="sub-menu">
                    <!-- <li><a href="6-3-recipe submission.html">投稿したレシピ</a></li>6-3 -->
                    <li><a href="6-1-recipe_list.html">レシピ一覧</a></li><!--6-1-->
                    <li><a href="7-1-nutrition.html">健康</a></li><!--7-1-->
                    <li><a href="8-1-motion.html">運動</a></li><!--8-1-->
                </ul>
            </aside>
        </div>
    </div> 
</body>
</html>