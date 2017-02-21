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

Route::get("salut", ['middleware' => 'ip', function(){
    return "Salut";
}]);

Route::group(['prefix' => 'admin', 'middleware' => 'ip'], function(){

    Route::get("salut/{name}-{id}", ['as' => 'salut', function($name, $id){
        return "Lien: " . route("salut", ["name" => $name, "id" => $id]);
    }])->where("name", '[a-z0-9\-]+')->where("id", '[0-9]+');

});

Route::controller('welcome', 'WelcomeController');

Route::get("about", ["as" => "about", "uses" => "PagesController@about"]);




Route::get('cache', function(){
    dd(Cache2::get('MaKey'));
});



Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('r/{link}', ['as' => 'link.show', 'uses' => 'LinksController@show'])->where('link', '[0-9]+');
Route::resource('link', 'LinksController', ['only' => ['create', 'store']]);
/*  ------ This is now handled by 'resource' with a Rest URL Structure ! ------
Route::get('link/create', 'LinksController@create');
Route::post('link/create', 'LinksController@store');
*/


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);