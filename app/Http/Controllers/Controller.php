<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function setSuccessMessage($message)
    {
    	Session::flash('message',$message);
        Session::flash('type','success');
    }
     public function setErrorMessage($message)
    {
    	Session::flash('message',$message);
        Session::flash('type','danger');
    }
}
