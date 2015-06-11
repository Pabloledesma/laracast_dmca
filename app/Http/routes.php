<?php



/**
 * Pages Controller
 */
get('/', 'PagesController@home');
//get('auth/login', 'PagesController@authForm');
//get('auth/register', 'PagesController@registerForm');


Route::resource('notices', 'NoticesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);