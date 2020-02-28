<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
class UserLoginController extends Controller
{
    public function index()
    {
    	return  view('layouts.login');
    }

    public function login(Request $request)
    {

            $rememberMe = false;   
            if(isset($request->remember_me))
                $rememberMe = true; 

        if ($user = Sentinel::Authenticate($request->all(),$rememberMe)) {
            if ($activation = Activation::completed($user))
    		{
              // return "Authentication activate";
                if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='admin')
                {
                    return redirect('/admin');
                }
                elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='manager')
                {
                    return redirect('/manager');
                }
                elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='user')
                {
                    return redirect('/');
                }
    		}else {
    		    return "Authentication not activate";
    		}
        }else{
             session()->flash('message','Credentials do not match!!');
            session()->flash('type','error');
            return back();
        }    
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/login');
    }


}
