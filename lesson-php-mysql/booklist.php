<?php
    // MySQLサーバー接続に必要な値を変数に代入
    $username='root';
    $password='';
    
    // POD のインスタンスを生成して、MySQLサーバーに接続
    $database= new PDO('mysql:host=localhost;dbname=booklist;charset=UTF8;',$username,$password);

    // フォームから書籍タイトルが送信されていればデータベースに保存する
    if($_POST['book_title']){
        //実行するSQLを作成
        $sql = 'INSERT INTO books (book_title) VALUES(:book_title)';
        // ユーザ入力に依存するSQLを実行するので、セキュリティ対策をする
        $statement = $database->prepare($sql);
        // ユーザ入力データ($_POST['book_title'])をVALUES(?)の？の部分に代入する
        $statement->bindParam(':book_title',$_POST['book_title']);
        // SQL文を実行する
        $statement->execute();
        // ステートメントを破棄する
        $statement = null;
    }



    
    // 実行するSQLを作成
    $sql = 'SELECT * FROM books ORDER BY created_at DESC ';
    
    //SQLを実行する
    $statement = $database->query($sql);
    
    
    //結果レコード(ステートメントオブジェクト)を配列に変換する
    $records = $statement->fetchAll();
    
    //ステートメントを破棄する
    $statement = null;
    
    // MySQLを使った処理が終わると。接続は不要なので切断する
    $database = null;
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>booklist</title>
    </head>
    <body>
<?php
    // フォームデータ送受信確認用コード（本番では削除）
    print '<div style="background-color: skyblue;">';
    print '<p>動作確認用:</p>';
    print_r($_POST);
    print '</div>';
?>
        <a href="booklist.php" ><h1>booklist</h1></a>
        <h2>書籍のフォーム</h2>
        <form action="booklist.php" method="POST">
            <input type="text" name="book_title" placeholder="書籍タイトルを入力" required>
            <input type="submit" name="submit_add_book" value="登録">
        </form>
        <h2>登録された書籍一覧</h2>
        <ul>
            
<?php
            if($records){
                foreach ($records as $record) {
                    $book_title = $record['book_title'];
?>
                    <li><?php print htmlspecialchars($book_title, ENT_QUOTES, 'UTF-8'); ?></li>
<?php
                }
            }
?>                
        </ul>
    </body>
    
</html>