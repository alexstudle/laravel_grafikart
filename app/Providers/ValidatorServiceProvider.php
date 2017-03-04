<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidatorServiceProvider extends ServiceProvider {

    public function boot(){
        Validator::extend('aaaa', function ($attribute, $value, $parameters, $validator){
            var_dump($attribute);
            var_dump($value);
            var_dump($parameters);
            var_dump($validator);
            die();
        });
    }

    public function register(){

    }
}