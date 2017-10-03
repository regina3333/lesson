<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.09.2017
 * Time: 19:05
 */

namespace Models;


class Product extends \Database
{
    public $table = "products";
    public $allowed=['title' ,'description', 'price'];
}