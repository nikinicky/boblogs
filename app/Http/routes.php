<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getIndex']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
Route::get('todoapp', 'TodoAppController@index');

Route::resource('api/todos', 'TodosController');

// Route::get('login', ['as' -> 'login'. 'uses' => 'UsersController@getIndex']);
// Route::post('login', 'AccountController@login');


Route::controllers([
  'auth' => 'Auth\AuthController'
]);
