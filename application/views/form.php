<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Bookshelf | ほんだな</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/bookshelf.css">
  </head>
  <body>
    <header>
      <div id="header">
        <div id="logo">
          <a href="./index.php"><img src="../../public/images/logo.png" alt="Bookshelf"></a>
        </div>
        <nav>
          <a href="./form.php"><img src="../../public/icon_plus.png" alt="">書籍登録</a>
        </nav>
      </div>
    </header>
    <div class="wrapper">
      <div id="main">
        <form action="index.php" method="POST" class="form_book" enctype="multipart/form-data">
          <div class="book_title">
            <input type="text" name="book_title" placeholder="書籍タイトルを入力" required>
          </div>
          <div class="book_image">
            <input type="file" name="book_image">
          </div>
          <div class="book_submit">
            <input type="submit" name="submit_add_book" value="登録">
          </div>
        </form>
      </div>
    </div>
    <footer>
      <small>© 2017 Bookshelf.</small>
    </footer>
  </body>
</html>