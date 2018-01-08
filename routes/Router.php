<?php

require_once '../vendor/Template.php';
require_once '../vendor/Request.php';

/**
 * リクエスト振り分けクラス
 *
 * URLで指定したコントローラー名に対応するクラスを呼び出す。
 */
class Router {
    private $system_root;

    /**
     * ルートディレクトリの設定
     *
     * @param string $path 設定したいディレクトリのパス
     */
    public function set_system_root($path) {
        $this->system_root = rtrim($path, '/');
    }

    /**
     * リクエストの振り分け
     */ 
    public function route() {

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

        // インスタンス化したコントローラーを取得
        $controller_instance = $this->get_controller_instance($controller);

        if ($controller == NULL) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }

        // 2番目のパラメータをコントローラーのメソッドとして取得
        // ない場合は初期表示なのでindex
        $action = 'index';
        if (count($params) > 1) {
            $action = $params[1];
        }

        // コントローラーメソッドの存在確認
        if (method_exists($controller_instance, $action)) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }

        // コントローラー初期設定
        $controller_instance->set_system_root($this->system_root);
        $controller_instance->set_controller_action($controller, $action);

        // // コントローラーのメソッドを実行
        // $action_method = $action;
        // $controller_instance->$action_method();

        // コントローラー事前共通処理実行
        $controller_instance->run(); 
    }

    /**
     * 生成したコントローラーを取得
     *
     * @param string $controller コントローラー名文字列
     * @return object 生成したコントローラー
     */
    private function get_controller_instance($controller) {
        // パラメータから取得したコントローラ名でクラスの振り分け
        // 1文字目は大文字にする
        $class_name = ucfirst(strtolower($controller)) . 'Controller';

        // コントローラーファイル名
        $controller_file_name = sprintf('%s/application/controllers/%s.php', $this->system_root, $class_name);

        // ファイル存在チェック
        if (!file_exists($controller_file_name)) {
            return NULL;
        }

        // コントローラークラス読み込み
        require_once $controller_file_name;

        // クラス定義チェック
        if (!class_exists($class_name)) {
            return NULL;
        }

        // コントローラー生成
        $controller_instance = new $class_name();

        return $controller_instance;
    }
}