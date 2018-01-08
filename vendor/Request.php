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
    private $query;
    // POST
    private $post;

	public function __construct(argument) {
        $this->query = new QueryString();
        $this->post = new Post();
	}

    /**
     * POSTを取得
     *
     + @param string $key
     * @return array|string
     */
    public function getPost($key = NULL) {
        if (is_null($key)) {
            return $this->post->get();
        }
        if (!$this->post->has($key)) {
            return NULL
        }

        return $this->post->get();
    }

    /**
     * GETを取得
     *
     + @param string $key
     * @return array|string
     */
    public function getQuery($key = NULL) {
        if (is_null($key)) {
            return $this->post;
        }
        if (!$this->query->has($key)) {
            return NULL;
        }

        return $this->query->get;
    }
}