<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectWithToken($url , $token)
    {

    	if (strpos($url , '?')){
    		$url = $url.'&token='. $token;
    	} 
    	else
    	{
    		$url = $url.'?token='. $token;
    	}

    	return redirect($url);
    }
}
