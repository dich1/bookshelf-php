<?php

/**
 * POST変数クラス
 *
 * カプセル化したリクエストのPOSTをフィールドに保持するためのクラス。
 * スーパーグローバル変数は直接参照しない。
 *
 * @category Variables
 * @package Request
 */
class Post extends RequestVariables {

    /**
     * POSTのリクエストを設定
     */
    protected function setValues() {
        foreach ($_POST as $key => $value) {
            $this->_values[$key] = $value;
        }
    }
}

?>