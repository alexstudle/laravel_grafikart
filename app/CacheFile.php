<?php
/**
 * Created by PhpStorm.
 * User: astudle
 * Date: 21/02/2017
 * Time: 19:50
 */

namespace App;


class CacheFile implements CacheInterface
{

    public function set($key, $val)
    {
        // TODO: Implement set() method.
    }

    public function get($key)
    {
        return 'lol' . $key;
    }
}