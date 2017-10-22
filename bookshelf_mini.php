<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Bookshelf | ほんだな</title>
  </head>
  <body>
    <a href="bookshelf_mini.php"><h1>Bookshelf</h1></a>
    <h2>書籍登録フォーム</h2>
    <form action="bookshelf_mini.php" method="POST">
      <input type="text" name="book_title" placeholder="書籍タイトルを入力" required>
      <input type="submit" name="submit_add_book" value="登録">  
    </form>
    <h2>登録書籍一覧</h2>
    <ul>
        <li>書籍タイトル1</li>
        <li>書籍タイトル2</li>
        <li>書籍タイトル3</li>
    </ul>
  </body>
</html>