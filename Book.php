<?php 

require_once('BaseModel.php');

class Book extends BaseModel {
    
    /**
     * トップを初期表示
     *
     * @return array 画面に表示するデータ群
     */
    function index() {
        $records = $this->getList();
        return $records;
    }

    /**
     * データを1件登録する
     *
     * @param string $input_title フォーム入力した値
     */
    function regist($input_value) {

        $input_title = $this->escape($input_value);

        $sql = "INSERT INTO bookshelf_mini.books (book_title) VALUES('$input_title')";

        // SQL実行
        $insert_result = $this->query($sql);

        return $insert_result;
    }

    /**
     * データの一覧を取得
     *
     * @return array セレクト文実行結果
     */
    function getList() {

        $sql = "SELECT * FROM books ORDER BY created_at DESC";

        // SQL実行
        $select_result = $this->query($sql);

        return $select_result;
    }
}