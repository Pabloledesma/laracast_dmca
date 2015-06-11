<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Http\Requests;
use App\Http\Requests\PrepareNoticeRequest;
use App\Http\Controllers\Controller;

class NoticesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');	
    }

    public function index()
    {
    	return view('notices.index');
    } 

    public function create()
    {
    	// get list of providers
        $providers = Provider::lists('name', 'id');

        return view('notices.create', compact('providers'));
    }

    public function confirm(PrepareNoticeRequest $request)
    {
        return $request->all(); 
        
    }  
}
