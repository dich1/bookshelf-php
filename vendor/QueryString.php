<?php

/**
 * GET変数クラス
 *
 * カプセル化したリクエストのGETを扱うためのクラス。
 * スーパーグローバル変数は直接参照しない。
 *
 * @category Variables
 * @package Request
 */
class QueryString extends RequestVariables {

    /**
     * GETのリクエストを設定
     */
	protected function setValues() {
        foreach ($_GET as $key => $value) {
            $this->_values[$key] = $value;
        }
	}

}

?>