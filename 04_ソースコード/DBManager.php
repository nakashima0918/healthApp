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

    public function getUserByEmail($email)
{
    // メールアドレスに対応するユーザーを取得する処理
    $sql = "SELECT * FROM user WHERE address = ?";
    try {
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // エラーメッセージを表示
        echo "エラー: " . $e->getMessage();
        return null; // エラーが発生した場合は null を返す
    }

    return $user; // ユーザーが存在すれば配列、存在しなければ null を返す
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

    // ユーザー情報取得
    public function userInfoGet($uId) {
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM user WHERE user_id = ?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $uId, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    //ユーザー情報の更新
    public function updateinfo($name, $address, $password, $m_goal, $c_goal, $uId) {
        $pdo = $this->dbConnect();
        $sql = "UPDATE `user` SET `user_name`=?,`address`=?,`password`=?,`m_goal`=?,`c_goal`=? WHERE user_id=?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->bindValue(2, $address, PDO::PARAM_STR);
        $ps->bindValue(3, $password, PDO::PARAM_STR);
        $ps->bindValue(4, $m_goal, PDO::PARAM_INT);
        $ps->bindValue(5, $c_goal, PDO::PARAM_INT);
        $ps->bindValue(6, $uId, PDO::PARAM_INT);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }
    public function calorieregist($c_date, $uId, $t_calorie, $calorie)
    {
        // ユーザーの食事のカロリーをデータベースに登録する処理
        $sql = "INSERT INTO calorie (c_date_id, user_id, total_calorie, calorie) VALUES (?, (SELECT 'calorie' FROM 'user' WHERE 'user_id' = ?), ?, ?)";
        try {
            $statement = $this->pdo->prepare($sql);
            $success = $statement->execute([$c_date, $uId, $t_calorie, $calorie]);
        } catch (PDOException $e) {
            // エラーメッセージを表示
            echo "エラー: " . $e->getMessage();
            return false; // エラーが発生した場合は false を返す
        }

        return $success; // 登録に成功した場合 true、失敗した場合 false を返す
    }
    public function motionregist($m_date, $uId, $t_movement, $movement)
    {
        // ユーザーのカロリーをデータベースに登録する処理
        $sql = "INSERT INTO motion (m_date_id, user_id, total_movement, movement) VALUES (?, (SELECT 'calorie' FROM 'user' WHERE 'user_id' = ?), ?, ?)";
        try {
            $statement = $this->pdo->prepare($sql);
            $success = $statement->execute([$m_date, $uId, $t_movement, $movement]);
        } catch (PDOException $e) {
            // エラーメッセージを表示
            echo "エラー: " . $e->getMessage();
            return false; // エラーが発生した場合は false を返す
        }

        return $success; // 登録に成功した場合 true、失敗した場合 false を返す
    }
    public function calorieupdate($c_date, $uId, $t_calorie, $calorie) {
        $pdo = $this->dbConnect();
        $sql = "UPDATE `calorie` SET `c_date_id`=?,`user_id`=?,`total_movement`=?,`movement`=?, WHERE user_id=?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $c_date, PDO::PARAM_INT);
        $ps->bindValue(2, $uId, PDO::PARAM_INT);
        $ps->bindValue(3, $t_calorie, PDO::PARAM_INT);
        $ps->bindValue(4, $calorie, PDO::PARAM_INT);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }
    public function motionupdate($m_date, $uId, $t_movement, $movement) {
        $pdo = $this->dbConnect();
        $sql = "UPDATE `motion` SET `total_movement`=?,`movement`=?, WHERE user_id=?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $m_date, PDO::PARAM_INT);
        $ps->bindValue(2, $uId, PDO::PARAM_INT);
        $ps->bindValue(1, $t_movement, PDO::PARAM_INT);
        $ps->bindValue(2, $movement, PDO::PARAM_INT);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }
    public function coloriedelete($uId) {
        $pdo = $this->dbConnect();
        $sql = "DELETE FROM calorie WHERE user_id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute(["user_id"]);
    }
    public function motiondelete($uId) {
        $pdo = $this->dbConnect();
        $sql = "DELETE FROM motion WHERE user_id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute(["user_id"]);
    }
}

?>