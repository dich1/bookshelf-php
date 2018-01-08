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
     * @param string $get 
     * @return array|string
     */
    public function get($get = NULL) {
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
     * リクエストの値が存在するか確認
     * 
     * @param string $get
     * @return boolean
     */
    public function has($get = NULL) {
        if (array_key_exists($key, $this->_values)) {
            return FALSE;
        }
        return TRUE;
    }
}

?>