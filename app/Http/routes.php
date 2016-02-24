<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home',['as' => 'home', 'uses' => 'PostController@index']);
Route::get('/posts/{slug}', ['as'=>'post-show', 'uses'=>'PostController@getShow']);
Route::get('/new', 'PostController@newPost');  //the view of creating new post
Route::post('/create-post', 'PostController@createPost'); //create new post
Route::get('/edit/{slug}','PostController@edit'); 
Route::post('/update-post','PostController@update');

//comments
Route::post('/comments','CommentController@save');

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

});
