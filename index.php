<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Bookshelf | ほんだな</title>
    <link rel="stylesheet" type="text/css" href="bookshelf.css">
  </head>
  <body>
    <header>
      <div id="header">
        <div id="logo">
          <a href="./bookshelf_index.php"><img src="./images/logo.png" alt="Bookshelf"></a>
        </div>
        <nav>
          <a href="./bookshelf_form.php"><img src="./images/icon_plus.png" alt="">書籍登録</a>
        </nav>
      </div>
    </header>
    <div id="cover">
      <h1 id="cover_title">ほんだな</h1>
      <form action="bookshelf_index.php" method="post">
        <div class="book_status unread active">
          <input type="submit" name="submit_only_unread" value="未読">
          <div class="book_count">20</div>
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
          <div class="book_item">
            <div class="book_image">
              <img src="./images/item_book_1.jpg" alt="">
            </div>
            <div class="book_detail">
              <div class="book_title">
                タイトル1
              </div>
              <form action="bookshelf_index.php" method="post">
                <div class="book_status unread active">
                  <input type="submit" name="submit_book_unread" value="未読">
                </div>
                <div class="book_status reading">
                  <input type="submit" name="submit_book_reading" value="読書中">
                </div>
                <div class="book_status finished">
                  <input type="submit" name="submit_book_finished" value="既読">
                </div>
              </form>
              <form action="bookshelf_index.php" method="post">
                <div class="book_delete">
                  <input type="submit" name="submit_book_delete" value="削除する"><img src="./images/icon_trash.png" alt="icon trash">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <small>© 2017 Bookshelf.</small>
    </footer>
  </body>
</html>