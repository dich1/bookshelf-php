<?php 

/**
 * 基点コントローラークラス
 *
 * 処理単位でメソッドを作成する。
 * モデルクラスとビュークラスを制御する。
 *
 * @category Base
 * @package Controller
 */
abstract class BaseController {

    protected $system_root;
    protected $controller = 'book';
    protected $action = 'index';
    protected $veiw;
    protected $request;
    protected $template_path;

    public function __constract() {
        $this->request = new Request();
    }

    /**
     * ルートディレクトリの設定
     *
     * @param string $path 設定したいディレクトリのパス
     */
    public function set_system_root($path) {
        $this->system_root = $path;
    }

    /**
     * コントローラーの設定
     *
     * @param string $controller コントローラー名
     * @param string $action メソッド名
     */
    public function set_controller_action($controller, $action) {
        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * コントローラー処理実行
     */
    public function run() {
        try {
            // ビューの初期化
            $this->initialize_view();

            // 事前共通処理
            $this->pre_action();

            // コントローラーメソッド
            $method_name = $this->action;
            $this->method_name;

            $this->view->show($this->template_path);

        } catch (Exception $e) {
            // ログ出力
            var_dump('エラー');
        }
    }

    /**
     * モデルオブジェクトを生成
     *
     * @param string $class_name モデルクラス名文字列
     * @return object モデルオブジェクト
     */
    protected function createModel($class_name) {

        $class_file = sprintf('%s/application/models/%s.php', $this->system_root, $class_name);
        // ファイル存在チェック
        if (!file_exists($class_file)) {
            return FALSE;
        }
        require_once $class_file;
        // クラス存在チェック
        if (!class_exists($class_name)) {
            return FALSE;
        }

        return new $class_name();
    }

    /**
     * ビューの生成
     */
    public function initialize_view() {

        $this->veiw = new Template();

        $this->template_path = ('%s/%s.php', $this->controller, $this->action);
    }

    /**
     * 事前共通処理(オーバーライド用)
     */
    protected function pre_action() {

    }
}

?>