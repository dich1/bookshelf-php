<?php 

require_once(dirname(__FILE__) . "/BaseModel.php");

class Book extends BaseModel {
    
    /**
     * 1件登録する
     *
     * @param string $input_value フォーム入力した値
     * @return array インサート文実行結果
     */
    function register($input_value) {

        if ($input_value['submit_add_book']) {

            $input_title = $this->escape($input_value['book_title']);

            // 画像をアップロードフォルダに移動
            $file_name = $_FILES['book_image']['name'];
            $image_path = './uploads/' . $file_name;
            move_uploaded_file($_FILES['book_image']['tmp_name'], $image_path);

            $sql = "INSERT INTO 
                        bookshelf.books (title, image, status) 
                    VALUES 
                        ('$input_title', '$image_path', 'unread')";

            return $this->query($sql);
        }
    }

    /**
     * 一覧を取得
     *
     * @return array セレクト文実行結果
     */
    function get_list() {

        $sql = "SELECT * 
                  FROM books 
              ORDER BY created_at 
                  DESC"
                     ;

        return $this->query($sql);
    }

    /**
     * 未読数を取得
     *
     * @return array セレクト文実行結果
     */
    function get_unread_count() {

        $sql = 'SELECT COUNT(*) as count 
                  FROM books 
                 WHERE status = "unread"'
                     ;
        
        return $this->query($sql);
    }

    /**
     * 読書中数を取得
     *
     * @return array セレクト文実行結果
     */
    function get_reading_count() {

        $sql = 'SELECT COUNT(*) as count 
                  FROM books 
                 WHERE status = "reading"'
                     ;
        
        return $this->query($sql);
    }

    /**
     * 既読数を取得
     *
     * @return array セレクト文実行結果
     */
    function get_finished_count() {

        $sql = 'SELECT COUNT(*) as count 
                  FROM books 
                 WHERE status = "finished"'
                     ;
        
        return $this->query($sql);
    }    
}