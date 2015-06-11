<?php



/**
 * Pages Controller
 */
get('/', 'PagesController@home');
//get('auth/login', 'PagesController@authForm');
//get('auth/register', 'PagesController@registerForm');

/**
 * Notices
 */
Route::resource('notices', 'NoticesController');
get('notices/create/confirm', 'NoticesController@confirm');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);