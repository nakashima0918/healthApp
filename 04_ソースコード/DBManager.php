<?php
class DBManager
{
	private $pdo; // PDOインスタンスを保持

    public function __construct()
    {
        $this->pdo = $this->dbConnect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラーモードを設定
    }

    // DB接続のメソッド
    private function dbConnect() {
        $dsn = 'mysql:host=mysql219.phy.lolipop.lan;dbname=LAA1418437-healthapp;charset=utf8';
        $user = 'LAA1418437';
        $password = 'fujihealth';
        $pdo = new PDO($dsn, $user, $password);

        return $pdo;
    }

    //テスト用
    public function test() {
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM user";
        $ps = $pdo->query($sql);

        $ps->execute();

        $result = $ps->fetchAll();
        return $result;
    }

    //以下処理---------------------------

    public function checkEmailDuplicate($email)
    {
        // メールアドレスの重複をチェックする処理
        $sql = "SELECT COUNT(*) as cnt FROM user WHERE address = ?";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$email]);
            $record = $statement->fetch();
        } catch (PDOException $e) {
            // エラーメッセージを表示
            echo "エラー: " . $e->getMessage();
            return false; // エラーが発生した場合は false を返す
        }

        return $record['cnt'] > 0; // 重複があれば true、なければ false を返す
    }

    public function registerUser($name, $email, $password)
    {
        // 新しいユーザーをデータベースに登録する処理
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO user (user_name, address, password) VALUES (?, ?, ?)";
        try {
            $statement = $this->pdo->prepare($sql);
            $success = $statement->execute([$name, $email, $hash]);
        } catch (PDOException $e) {
            // エラーメッセージを表示
            echo "エラー: " . $e->getMessage();
            return false; // エラーが発生した場合は false を返す
        }

        return $success; // 登録に成功した場合 true、失敗した場合 false を返す
    }

    // ユーザーのパスワードを更新
    public function updatePass($mail, $pass) {
        $pdo = $this->dbConnect();
        $sql = "UPDATE user SET password = ? WHERE address = ?;";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $pass, PDO::PARAM_STR);
        $ps->bindValue(2, $mail, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    // ユーザー名を更新
    public function updateName($uId, $name) {
        $pdo = $this->dbConnect();
        $sql = "UPDATE user SET user_name = ? WHERE address = ?;";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->bindValue(2, $uId, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }
}

?>