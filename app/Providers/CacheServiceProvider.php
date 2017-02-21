<?php
/**
 * Created by PhpStorm.
 * User: astudle
 * Date: 21/02/2017
 * Time: 20:06
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot(){

    }

    public function register(){
        $this->app->bind('App\CacheInterface', 'App\CacheFile');
    }

    public function provides(){
        return ['App\CacheInterface'];
    }
}