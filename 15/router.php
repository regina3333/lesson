<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.10.2017
 * Time: 18:38
 */
class router
{
    public function __construct(\Models\Product $products,\Models\Review $reviews)
    {
        $this->products = $products;
        $this->reviews = $reviews;
    }

    protected function handleGet($url)
    {

//        var_dump($url);
        if ($url === '' || $url === '/index.php') {
            $products = $this->products->getAll();
            $reviews = $this->reviews->getAll();

          //  var_dump($products,$reviews);
            include_once 'views/list.php';
        }
    }

    public
    function execute()
    {
        $url_src = $_SERVER ['REQUEST_URI'];
        $url = str_replace('/php-lessons-master/15/index.php', '', $url_src);
//        var_dump($url);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->handleGet($url);
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    }
    }

}