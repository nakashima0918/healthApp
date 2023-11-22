<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();

//パスワードのハッシュ化
$hash = password_hash($_SESSION['input_pass'], PASSWORD_BCRYPT);

// 指定したユーザーのパスワードを更新
$userPass = $dbmng->updatePass($_SESSION['mail'],$hash);

header('Location: 3-4-reset_pass_com.html');

?>