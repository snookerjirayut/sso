<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SsoController extends Controller
{
	public function __construct()
    {
		session()->regenerateToken();
    }

    public function index(Request $request)
    {
        $url = $request->input('redirect_url');

    	return view('sso.login' , ['redirect_url' => $url]);
    }

    public function store(Request $request)
    { 
        $email = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' =>  $password])) {
            // Authentication passed...
            $token = base64_encode(str_random(64));
            $request->session()->push('sso' , $token);

            $url = $request->input('redirect_url');
            if (empty($url)) 
            {
                return response()->view('vendor.logined' , ['token' => $token]);
            }
            
            return parent::redirectWithToken($url, $token);
        }

        return redirect()->route('sso.index')->with('error' , 'Username or Password incorrect.');
    }

    public function delete(Request $request)
    {
        return redirect()->route('sso.index');
    }

}
