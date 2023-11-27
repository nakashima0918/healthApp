<?php
session_start();
// require_once './DBManager.php';
// $dbmng = new DBManager();
$_SESSION['motion'] = "";
$_SESSION['calorie'] = "";
// ユーザー名未入力チェック
if(empty($_POST['name'])) {
    $_SESSION['error'] = "ユーザー名が入力されていません。";
    header('Location: 5-2-user_chg.php');
} else {
    $_SESSION['name'] = $_POST['name'];
    // header('Location: 5-3-user_chk.php');
}
// メールアドレス未入力チェック
if(empty($_POST['mail'])) {
    $_SESSION['error'] = "メールアドレスが入力されていません。";
    header('Location: 5-2-user_chg.php');
} else {
    $_SESSION['mail'] = $_POST['mail'];
    // header('Location: 5-3-user_chk.php');
}
// パスワード未入力チェック
if(empty($_POST['pass1']) || empty($_POST['pass2'])) {
    $_SESSION['error'] = "パスワードが入力されていません。";
    header('Location: 5-2-user_chg.php');
}else if($_POST['pass1'] != $_POST['pass2']){
    $_SESSION['error'] = "パスワードが一致しません。";
    header('Location: 5-2-user_chg.php');
}else{
    $_SESSION['input_pass'] = $_POST['pass1'];
    // header('Location: 5-3-user_chk.php');
}
// 目標運動量未入力チェック
if(empty($_POST['motion'])) {
    $_SESSION['error'] = "目標運動量が入力されていません。";
    header('Location: 5-2-user_chg.php');
} else {
    $_SESSION['motion'] = $_POST['motion'];
    // header('Location: 5-3-user_chk.php');
}
// 目標カロリー未入力チェック
if(empty($_POST['calorie'])) {
    $_SESSION['error'] = "目標運動量が入力されていません。";
    header('Location: 5-2-user_chg.php');
} else {
    $_SESSION['calorie'] = $_POST['calorie'];
    // header('Location: 5-3-user_chk.php');
}
header('Location: 5-3-user_chk.php');
?>