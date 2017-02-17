<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("salut/{name}-{id}", ['as' => 'salut', function($name, $id){
    return "Lien: " . route("salut", ["name" => $name, "id" => $id]);
}])->where("name", '[a-z0-9\-]+')->where("id", '[0-9]+');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get("salut", function(){
        return "Salut";
    });

});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
