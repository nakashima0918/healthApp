<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();

//パスワードのハッシュ化
$hash = password_hash($_SESSION['input_pass'], PASSWORD_BCRYPT);

// 指定したメールアドレスの更新
$user_name = $dbmng->updatename($_SESSION['mail']);
// 指定したユーザー名の更新
$user_name = $dbmng->updatename($_SESSION['name']);
// 指定したユーザーのパスワードを更新
$input_pass = $dbmng->updatePass($_SESSION['input_pass']);
// 目標運動量の更新
$input_motion = $dbmng->updatemotion($_SESSION['motion']);
// 目標カロリーの更新
$input_calorie = $dbmng->updatecalorie($_SESSION['calorie']);
header('Location: 5-4-user_com.html');

?>