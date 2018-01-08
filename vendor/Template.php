<?php 

/**
 * 基点ビュークラス
 *
 * テンプレートエンジン
 * 
 * @category Base
 * @package View
 */
class Template {

    /**
     * テンプレートを表示
     * 
     * @param string $view_file ファイル名
     */
    public function show($view_file) {
        $view = $this;
        include (dirname(__FILE__) . "/../application/views/{$view_file}");
    
    }
}
?>