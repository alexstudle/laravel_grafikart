<?php

namespace App;


interface CacheInterface
{
    public function set($key, $val);
    public function get($key);
}