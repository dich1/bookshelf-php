<?php

class BaseModel {
    // databaseオブジェクト
    protected $db;
    // クエリの実行で該当した行数
    protected $count;  

    /**
     * DBインスタンスを生成するコンストラクタ
     */
    function __construct() {
        $this->initDB();
    }

    /**
     * DB接続を終了するデストラクタ
     */
    function __destruct() {
        $this->db->close();
    }

    /**
     * データベースオブジェクトを作成
     */
    function initDB() {
        // DB接続
        $this->db = new mysqli(HOST, USERNAME, PASSWORD, DB_NAME);
        if ($this->db->connect_error) {
            echo $this->db->connect_error;
            exit;
        } else {
            // 文字コード設定
            $this->db->set_charset("utf8");
        }
    }

    /**
     * クエリの実行
     *
     * @param string $sql クエリ文字列
     * @param array 実行結果
     */
    function query($sql) {
        // SQL実行
        $query_result = $this->db->query($sql);

        // 不正なSQL文(実行失敗時はFALSEを返す)
        if ($query_result === FALSE) {
            // エラー内容
            $error = $this->db->errno.": ".$this->db->error;
            // 戻り値
            $result = array(
                'status' => FALSE,
                'count'  => 0,
                'result' => "",
                'error'  => $error
            );

            return $result;
        }

        // INSERT、UPDATE、DELETE文(実行成功時はTRUEを返す)
        if ($query_result === TRUE) {
            // 該当の行数を格納
            $this->count = $this->db->affected_rows;
            // 戻り値
            $result = array(
                'status' => TRUE,
                'count'  => $this->count,
                'result' => "",
                'error'  => ""
            );

            return $result;
        } else {
        // SELECT文(実行成功時はobjectを返す)
            // SELECTした行数を格納
            $this->count = $query_result->num_rows;
            // 連想配列に格納
            $data = array();
            while ($row = $query_result->fetch_assoc()) {
                $data[] = $row;
            }
            // SQL実行結果を破棄
            $query_result->close();
            // 戻り値
            $result = array(
                'status' => TRUE,
                'count'  => $this->count,
                'result' => $data,
                'error'  => ""
            );
            return $result;
        }
    }

    /**
     * 文字列をエスケープする
     * 
     * @return string エスケープ後の文字列
     */
    function escape($string) {
        return $this->db->real_escape_string($string);
    }
}