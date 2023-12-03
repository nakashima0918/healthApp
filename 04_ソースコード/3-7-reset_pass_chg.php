<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();

// パスワード未入力チェック
if(empty($_POST['pass1'])) {
    $_SESSION['error'] = "メールアドレスが入力されていません。";
    header('Location: 3-1-reset_pass_uchk.php');
}else{
    $_SESSION['mail'] = $_POST['mail'];
    header('Location: 3-2-reset_pass.php');
}

?>