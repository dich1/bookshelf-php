<?php

/**
 * 初期表示
 * 
 * @return array 登録データ
 */
function index() {
    $database = connectDB();
  
    if (isset($_POST['book_title'])) {
        insertDB($database, $_POST['book_title']);
    }

    $records = selectDB($database);

    return $records;
}

/**
 * データベースに接続する
 *
 * @return object データベースハンドルオブジェクト
 */
function connectDB() {
    // 接続
    $database = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

    // 失敗処理
    if ($database == false) {
      // mysqlエラーコード、エラー内容
      die('Connect Error' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    }

    // 文字コード設定
    $charset = 'utf8';
    mysqli_set_charset($database, $charset);

    return $database;
}

/**
 * データベースにデータを登録する
 *
 * @param object $database データベースハンドルオブジェクト
 * @param string $inputValue 入力情報
 */
function insertDB($database, $inputValue) {
    // データが送信されたら、DBに保存
    if ($inputValue) {
        ////プリペアドステートメント
        // SQL文を準備する
        $sql = 'INSERT INTO books (book_title) VALUES(?)';
        // SQLインジェクション対策
        $statement = mysqli_prepare($database, $sql);
        // クエスチョンパラメータに変数をバインドする
        // $statement：ステートメントハンドル
        // 's'：バインド変数の型(string)
        // $inputValue：パラメータに渡す値
        mysqli_stmt_bind_param($statement, 's', $inputValue);
        // SQL文を実行
        mysqli_stmt_execute($statement);
        // SQL文を破棄
        mysqli_stmt_close($statement);
    }
}

/**
 * データベースからデータを取得する
 * 
 * @param object $database データベースハンドルオブジェクト
 * @return array 書籍情報
 */
function selectDB($database) {
    // 最新のものから登録した本の情報を表示する
    $sql = 'SELECT * FROM books ORDER BY created_at DESC';
    $result = mysqli_query($database, $sql);

    if ($result) {
        $i = 0;
        // レコードを1件ずつ取り出す
        while($record = mysqli_fetch_assoc($result)) {
            $books[$i] = $record['book_title'];
            $i++;
        }
    }

    // 結果を破棄
    mysqli_free_result($result);
    // 切断
    mysqli_close($database);

    return $books;
}

/**
 * HTMLエンティティに変換する
 *
 * @param string $string フォームに入力した文字列
 * @return string HTMLエンティティ化した文字列 
 */
function h($string) {
    return htmlspecialchars($string);
}