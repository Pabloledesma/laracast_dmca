<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home()
    {
    	return view('pages.home');
    }

    /**
     * Show Authentication Form
     */
    public function authForm()
    {
        return view('auth.login');
    }

     /**
     * Show Register Form
     */
    public function registerForm()
    {
        return view('auth.register');
    }
}
