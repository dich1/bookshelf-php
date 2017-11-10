<?php 
  require_once('config.php');
  require_once('Book.php');

  $book = new Book();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book->register($_POST);
    header('Location:http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
  }

  $unread = $book->get_unread_count()['result'][0];
  $reading = $book->get_reading_count()['result'][0];
  $finished = $book->get_finished_count()['result'][0];
  $records = $book->index();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Bookshelf | ほんだな</title>
    <link rel="stylesheet" type="text/css" href="../../public/bookshelf.css">
  </head>
  <body>
    <header>
      <div id="header">
        <div id="logo">
          <a href="./index.php"><img src="../../public/images/logo.png" alt="Bookshelf"></a>
        </div>
        <nav>
          <a href="./form.php"><img src="../../public/images/icon_plus.png" alt="">書籍登録</a>
        </nav>
      </div>
    </header>
    <div id="cover">
      <h1 id="cover_title">ほんだな</h1>
      <form action="index.php" method="post">
        <div class="book_status unread active">
          <input type="submit" name="submit_only_unread" value="未読">
          <div class="book_count"><?= $unread['count']; ?></div>
        </div>
        <div class="book_status reading active">
          <input type="submit" name="submit_only_reading" value="読書中">
          <div class="book_count"><?= $reading['count']; ?></div>
        </div>
        <div class="book_status finished active">
          <input type="submit" name="submit_only_finished" value="既読">
          <div class="book_count"><?= $finished['count']; ?></div>
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
                  <input type="submit" name="submit_book_delete" value="削除する"><img src="../../public/images/icon_trash.png" alt="icon trash">
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