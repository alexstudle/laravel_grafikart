<?php
/**
 * Created by PhpStorm.
 * User: astudle
 * Date: 21/02/2017
 * Time: 20:15
 */

namespace App;


use Illuminate\Support\Facades\Facade;

class CacheFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'App\CacheInterface';
    }
}