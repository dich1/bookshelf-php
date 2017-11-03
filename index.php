<?php 
  require_once('config.php');
  require_once('Book.php');

  $db = new Book();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->regist($_POST['book_title']);
    header('Location:http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
  }
  $records = $db->index();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Bookshelf | ほんだな</title>
    <link rel="stylesheet" type="text/css" href="bookshelf.css">
  </head>
  <body>
  <?php 
    // フォームデータ送受信確認コード（本番時削除）
    // リダイレクト処理をコメントアウトする
    print '<div style="background-color: skyblue;">';
    print '<p>デバッグ用:</p>';
    var_dump($_POST['book_title']);
    print '</div>';
  ?>
    <header>
      <div id="header">
        <div id="logo">
          <a href="./index.php"><img src="./images/logo.png" alt="Bookshelf"></a>
        </div>
        <nav>
          <a href="./form.php"><img src="./images/icon_plus.png" alt="">書籍登録</a>
        </nav>
      </div>
    </header>
    <div id="cover">
      <h1 id="cover_title">ほんだな</h1>
      <form action="index.php" method="post">
        <div class="book_status unread active">
          <input type="submit" name="submit_only_unread" value="未読">
          <div class="book_count"></div>
        </div>
        <div class="book_status reading active">
          <input type="submit" name="submit_only_reading" value="読書中">
          <div class="book_count">23</div>
        </div>
        <div class="book_status finished active">
          <input type="submit" name="submit_only_finished" value="既読">
          <div class="book_count">14</div>
        </div>
      </form>
    </div>
    <div class="wrapper">
      <div id="main">
        <div id="book_list" class="clearfix">
          <!-- 登録された書籍タイトルの数だけ出力  -->
          <?php foreach($records['result'] as $value): ?>
          <div class="book_item">
            <div class="book_image">
              <img src="<?= $value['image']; ?>" alt="">
            </div>
            <div class="book_detail">
              <div class="book_title">
                <?= $value['title']; ?>
              </div>
              <form action="index.php" method="post">
                <div class="book_status unread">
                  <input type="submit" name="submit_book_unread" value="未読">
                </div>
                <div class="book_status reading">
                  <input type="submit" name="submit_book_reading" value="読書中">
                </div>
                <div class="book_status finished">
                  <input type="submit" name="submit_book_finished" value="既読">
                </div>
              </form>
              <form action="index.php" method="post">
                <div class="book_delete">
                  <input type="submit" name="submit_book_delete" value="削除する"><img src="./images/icon_trash.png" alt="icon trash">
                </div>
              </form>
            </div>
          </div>
          <?php endforeach; ?>     
        </div>
      </div>
    </div>
    <footer>
      <small>© 2017 Bookshelf.</small>
    </footer>
  </body>
</html>