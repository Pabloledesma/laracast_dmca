<?php

/*
| Home
*/
get('/', 'PagesController@home');


/**
 * Auth Controller
 */
get('auth/login', 'PagesController@authForm');
get('auth/register', 'PagesController@registerForm');