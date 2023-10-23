<?php
class DBManager
{

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


}
?>