<?php 
  require_once('config.php');
  require_once('functions.php');

  $records = index();
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Bookshelf | ほんだな</title>
  </head>
  <body>
  <?php 
    // フォームデータ送受信確認コード（本番時削除）
    print '<div style="background-color: skyblue;">';
    print '<p>デバッグ用:</p>';
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
      <!-- 登録された書籍タイトルの数だけ出力  -->
      <?php foreach($records as $value): ?>
        <li>
          <!-- XSS対策 -->
          <?php print h($value); ?>
        </li>
      <?php endforeach; ?>     
    </ul>
  </body>
</html>