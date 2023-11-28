<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();

// パスワード未入力チェック
if(empty($_POST['pass1']) || empty($_POST['pass2'])) {
    $_SESSION['error'] = "パスワードが入力されていません。";
    header('Location: 3-2-reset_pass.php');
}else if($_POST['pass1'] != $_POST['pass2']){
    $_SESSION['error'] = "パスワードが一致しません。";
    header('Location: 3-2-reset_pass.php');
}else{
    $_SESSION['input_pass'] = $_POST['pass1'];
    header('Location: 3-3-reset_pass_chk.php');
}

?>