<?php



/**
 * Pages Controller
 */
get('/', 'PagesController@home');
get('auth/login', 'PagesController@authForm');
get('auth/register', 'PagesController@registerForm');


get('notices/create', 'AuthController@registerForm');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);