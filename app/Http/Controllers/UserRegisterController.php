<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class UserRegisterController extends Controller
{
    public function index()
    {
    	return view('layouts.register');
    }

    public function store(Request $request)
    {
    	 $request->validate([
		        'first_name' => 'required',
		        'last_name' => 'required',
		        'email' => 'required|unique:users',
		        'password' => 'required|min:6|confirmed',
		    ]);

 		$user = Sentinel::registerAndActivate($request->all());
        // $roleforUser = Sentinel::findUserById(1);
        $user->roles()->attach(4);
        session()->flash('message','Registration  has been Successful !!');
        session()->flash('type','success');
 		return redirect()->back();
    }
}
