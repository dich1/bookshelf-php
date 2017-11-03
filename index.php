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
          <div class="book_item">
            <div class="book_image">
              <img src="./images/item_book_0.jpg" alt="">
            </div>
            <div class="book_detail">
              <div class="book_title">
                EFFECTIVE JAVA 第2版 (The Java Series)
              </div>
              <form action="index.php" method="post">
                <div class="book_status unread">
                  <input type="submit" name="submit_book_unread" value="未読">
                </div>
                <div class="book_status reading active">
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
          <div class="book_item">
            <div class="book_image">
              <img src="./images/item_book_1.jpg" alt="">
            </div>
            <div class="book_detail">
              <div class="book_title">
                Webを支える技術 -HTTP、URI、HTML、そしてREST (WEB+DB PRESS plus)
              </div>
              <form action="index.php" method="post">
                <div class="book_status unread">
                  <input type="submit" name="submit_book_unread" value="未読">
                </div>
                <div class="book_status reading">
                  <input type="submit" name="submit_book_reading" value="読書中">
                </div>
                <div class="book_status finished active">
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
          <div class="book_item">
            <div class="book_image">
              <img src="./images/item_book_2.jpg" alt="">
            </div>
            <div class="book_detail">
              <div class="book_title">
                体系的に学ぶ 安全なWebアプリケーションの作り方 脆弱性が生まれる原理と対策の実践
              </div>
              <form action="index.php" method="post">
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
              <form action="index.php" method="post">
                <div class="book_delete">
                  <input type="submit" name="submit_book_delete" value="削除する"><img src="./images/icon_trash.png" alt="icon trash">
                </div>
              </form>
            </div>
          </div>
          <div class="book_item">
            <div class="book_image">
              <img src="./images/item_book_3.jpg" alt="">
            </div>
            <div class="book_detail">
              <div class="book_title">
                達人に学ぶDB設計 徹底指南書
              </div>
              <form action="index.php" method="post">
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
              <form action="index.php" method="post">
                <div class="book_delete">
                  <input type="submit" name="submit_book_delete" value="削除する"><img src="./images/icon_trash.png" alt="icon trash">
                </div>
              </form>
            </div>
          </div>
          <div class="book_item">
            <div class="book_image">
              <img src="./images/item_book_4.jpg" alt="">
            </div>
            <div class="book_detail">
              <div class="book_title">
                基礎からのWordpress
              </div>
              <form action="index.php" method="post">
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
              <form action="index.php" method="post">
                <div class="book_delete">
                  <input type="submit" name="submit_book_delete" value="削除する"><img src="./images/icon_trash.png" alt="icon trash">
                </div>
              </form>
            </div>
          </div>
          <div class="book_item">
            <div class="book_image">
              <img src="./images/item_book_5.jpg" alt="">
            </div>
            <div class="book_detail">
              <div class="book_title">
                いきなり はじめるPHP
              </div>
              <form action="index.php" method="post">
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
              <form action="index.php" method="post">
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