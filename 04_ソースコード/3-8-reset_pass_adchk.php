<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();

// メアド未入力チェック
if(empty($_POST['mail'])) {
    $_SESSION['error'] = "パスワードが入力されていません。";
    header('Location: 3-1-reset_pass_uchk.php');
}else{
    $_SESSION['mail'] = $_POST['mail'];
    header('Location: 3-2-reset_pass.php');
}
//メアドが登録されているか
$address = $_POST['address'];

// データベースでメールアドレスが存在するか確認
$sql = "SELECT * FROM user WHERE メールアドレス = '$address'";
$result = $conn->query($sql);

// メールアドレスが存在しない場合はエラーを出力
if ($result->num_rows == 0) {
    $_SESSION['error'] = "メールアドレスが登録されていません。";
    header('Location: 3-1-reset_pass_uchk.php');
} else {
    header('Location: 3-2-reset_pass.php');
}

?>