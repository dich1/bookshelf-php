<?php

/**
 * リクエストオブジェクトクラス
 *
 * POST変数・GET変数クラスを1つのオブジェクトにまとめるクラス。
 *
 * @category Request
 * @package Request
 */
class Request {

    // GET
    private $_query;
    // POST
    private $_post;
    // URL
    private $_param;

	public function __construct(argument) {
        $this->_query = new QueryString();
        $this->_post = new Post();
        $this->_param = new UrlParameter();
	}

    /**
     * POSTを取得
     *
     * @param string $key キー名
     * @return string POST値
     */
    public function getPost($key = NULL) {
        if (is_null($key)) {
            return $this->_post->get();
        }
        if (!$this->_post->has($key)) {
            return NULL
        }

        return $this->_post->get($key);
    }

    /**
     * GETを取得
     *
     * @param string $key キー名
     * @return string GET値
     */
    public function getQuery($key = NULL) {
        if (is_null($key)) {
            return $this->_post;
        }
        if (!$this->_query->has($key)) {
            return NULL;
        }

        return $this->_query->get($key);
    }

    /**
     * URLパラメータを取得
     *
     * @param string $key キー名
     * @return string URLパラメータ値
     */
    public function getParam($key = NULL) {
        if (is_null($key)) {
            return $this->_param->get();
        }
        if (!$this->_param->has($key)) {
            return NULL
        }

        return $this->_param->get($key);
    }
}