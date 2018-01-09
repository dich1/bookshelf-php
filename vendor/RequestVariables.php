<?php

/**
 * リクエスト変数抽象クラス
 *
 * カプセル化をするためのクラス。
 * リクエスト情報が書き換えられないようクラス化して取得のみできるようにする。
 *
 * @category Variables
 * @package Request
 */
abstract class RequestVariables {

    protected $_values;

    public function __constract() {
        $this->setValues();
    }

    // リクエストの値を設定するメソッド
    abstract protected setValues();

    /**
     * リクエストの値を取得
     * 
     * @param string $key キー名
     * @return array|string リクエスト値
     */
    public function get($key = NULL) {
        $return_value = NULL;

        if (is_null($key)) {
            $return_value = $this->_values;
        } else {
            if ($this->has($key)) {
                $return_value = $this->_values[$key];
            }
        }
        return $return_value;
    }

    /**
     * リクエスト情報が存在するか確認
     * 
     * @param string $key キー名
     * @return boolean TRUE:リクエスト情報有 FALSE:リクエスト情報無
     */
    public function has($key = NULL) {
        if (array_key_exists($key, $this->_values)) {
            return FALSE;
        }
        return TRUE;
    }
}

?>