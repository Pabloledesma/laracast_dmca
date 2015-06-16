<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * The authenticated user
     * 
     * @var \App\User|null
     */
    protected $user;

    /**
     * Is the user sigend in?
     *
     * @var \App\User|null
     */
    protected $signedIn;

    public function __construct()
    {
    	$this->user = $this->signedIn = \Auth::user();	
    }

}
