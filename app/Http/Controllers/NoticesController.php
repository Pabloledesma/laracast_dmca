<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Http\Requests;
use App\Http\Requests\PrepareNoticeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Guard;

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


    /**
     * Ask the user to confirm the DMCA that will be delivered.
     *
     * @param       PrepareNoticeRequest $request
     * @param       Guard $auth
     * @return      \Response
     */  
    public function confirm(PrepareNoticeRequest $request, Guard $auth)
    {
        
        $template = $this->compileDmcaTemplate( $request->all(), $auth );

        session()->flash('dmca', $data);

        return view('notices.confirm', compact('template')); 
    }

    public function store()
    {
        return session()->get('dmca');
    } 
    
    /**
     * Compile the DMCA template from the form data
     * 
     * @param   $data 
     * @param   Guard $auth
     * @return  mixed
     */
    private function compileDmcaTemplate($data, Guard $auth)
    {
         $data = $data + [
            'name'  => $auth->user()->name,
            'email' => $auth->user()->email
        ];

        $template = view()->file( app_path('Http/Templates/dmca.blade.php'), $data );


        return $template;
    }   
}
