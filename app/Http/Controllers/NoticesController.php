<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Notice;
use App\User;
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
    	$notices = \Auth::user()->notices();
        dd( $notices );
        return view('notices.index', compact('notices'));
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
        $data = $request->all();

        $template = $this->compileDmcaTemplate( $data, $auth );

        session()->flash('dmca', $data);

        return view('notices.confirm', compact('template')); 
    }

    /**
     * Store a new DMCA Notice
     *
     * @param    Request $request
     * @return   Redirector
     */  
    public function store( Request $request )
    {
        $this->createNotice( $request );
        return redirect('notices');
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

    /**
    * Create and presist a new DMCA Notice
    *
    * @param    param
    * @return    return
    */
    public function createNotice( Request $request )
      {
        $data = session()->get('dmca'); 

        $notice = Notice::open( $data )->useTemplate( $request->template );
            
        \Auth::user()->notices()->save( $notice );
      }   
       
          
}
