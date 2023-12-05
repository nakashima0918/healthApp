<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();

$_SESSION['user_id'] = 3;

// // フォームから送信された新しい情報
// $newName = isset($_POST['new_name']) ? $_POST['new_name'] : '';
// $newMail = isset($_POST['new_mail']) ? $_POST['new_mail'] : '';
// $newInputPass = isset($_POST['new_input_pass']) ? $_POST['new_input_pass'] : '';
// $newMotion = isset($_POST['new_motion']) ? $_POST['new_motion'] : '';
// $newCalorie = isset($_POST['new_calorie']) ? $_POST['new_calorie'] : '';

// // データベースの更新処理
// $_SESSION['user_name'] = $newName;
// $_SESSION['mail'] = $newMail;
// $_SESSION['input_pass'] = $newInputPass;
// $_SESSION['motion'] = $newMotion;
// $_SESSION['calorie'] = $newCalorie;

// パスワードを暗号化
$hash = password_hash($_SESSION['input_pass'], PASSWORD_BCRYPT);

$previewDate = $dbmng->updateinfo($_SESSION['name'], $_SESSION['mail'], $hash, $_SESSION['motion'], $_SESSION['calorie'], $_SESSION['user_id']);

// 更新が成功した場合は遷移先のページにリダイレクト
header('Location: 5-4-user_com.html');
exit;
?>
