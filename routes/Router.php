<?php

class Router {
    private $system_root;

    /**
     * ルートディレクトリの設定
     *
     * @param string $path 設定したいディレクトリのパス
     */
    function set_system_root($path) {
        $this->system_root = rtrim($path, '/');
    }

    /**
     * リクエストの振り分け
     */ 
    function route() {

        // 末尾、先頭のスラッシュを削除
        $patterns = array(
            "/\/?$/",
            "/^\/*/"
        );
        $param = preg_replace($patterns, '', $_SERVER['REQUEST_URI']);

        $params = array();

        if ($param != '') {
            // パラーメータを/で区切る
            $params = explode('/', $param);
        }
    
        // 1番目のパラメータをコントローラーとして取得
        $controller = 'book';
        if (count($params) > 0) {
            $controller = $params[0];
            var_dump($params);exit;
        }

        // パラメータから取得したコントローラ名でクラスの振り分け
        $class_name = ucfirst(strtolower($controller)) . 'Controller';

        // コントローラークラス読み込み
        require_once $this->system_root . '/application/controllers/' . $class_name . '.php';

        // コントローラー生成
        $controller_instance = new $class_name();

        // 2番目のパラメータをコントローラーのメソッドとして取得
        // ない場合は初期表示なのでindex
        $action = 'index';
        if (count($params) > 1) {
            $action = $params[1];
        }

        // コントローラーのメソッドを実行
        $action_method = $action;
        $controller_instance->$action_method();
    }
}