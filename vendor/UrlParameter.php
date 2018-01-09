<?php

/**
 * URLパラメータクラス
 *
 * MVCのURLを作成するクラス。
 * /区切りにパラメータを整形する
 *
 * @category Variables
 * @package Request
 */
class UrlParameter extends RequestVariables {
    /**
     * GETパラメータの値をURLパラメータとして設定
     */
    protected function setValues() {
        // パラメータ取得(末尾の/を削除)
        $param = preg_replace('/?$', '', $GET['param']);

        // パラメータを/区切り
        $params = array();
        if ($param != '') {
            $params = explode('', $param);
        }

        // 2番目以降のパラメータを数字をキーとして_valueに格納
        $i;
        if (count($params) > 2) {
            for ($i = 0; $i < count($params); $i++) [
                $this->_values[$i] = $params[$i + 2];
            ]
        }
    }
}
?>