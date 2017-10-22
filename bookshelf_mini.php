<?php
  // 接続に必要な情報を用意する
  $host = 'localhost';
  $username = 'root';
  $password = 'root';
  $db_name = 'bookshelf_mini';

  // 接続
  $database = mysqli_connect($host, $username, $password, $db_name);

  // 失敗処理
  if ($database == false) {
    // mysqlエラーコード、エラー内容
    die('Connect Error' . mysqli_connect_errno() . ')' . mysqli_connect_error());
  }

  // 文字コード設定
  $charset = 'utf8';
  mysqli_set_charset($database, $charset);

  // SQL処理
  // 最新のものから登録した本の情報を表示する
  $sql = 'SELECT * FROM books ORDER BY created_at DESC';
  $result = mysqli_query($database, $sql);

  // 切断
  mysqli_close($database);

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Bookshelf | ほんだな</title>
    <link rel="stylesheet" href="bookshelf.css">
  </head>
  <body>
  <?php 
    // フォームデータ送受信確認コード（本番時削除）
    print '<div style="background-color: skyblue;">';
    print '<p>動作確認用:</p>';
    var_dump($_POST['book_title']);
    print '</div>';
  ?>
    <a href="bookshelf_mini.php"><h1>Bookshelf</h1></a>
    <h2>書籍登録フォーム</h2>
    <form action="bookshelf_mini.php" method="POST">
      <input type="text" name="book_title" placeholder="書籍タイトルを入力" required>
      <input type="submit" name="submit_add_book" value="登録">  
    </form>
    <h2>登録書籍一覧</h2>
    <ul>
      <?php // 登録された書籍タイトルの数だけ出力
        if ($result) {
          // レコードを1件取り出す
          // 全て取り出すとfalseが返る
          while ($record = mysqli_fetch_assoc($result)) {
            $book_title = $record['book_title'];
      ?>
            <li><?php print $book_title; ?></li>
      <?php
          }
          // 結果を破棄
          mysqli_free_result($result);
        }
      ?>
    </ul>
  </body>
</html>
