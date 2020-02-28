<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use Session;
use View;

class PasswordController extends Controller
{
 	 public function edit() {
        return view('layouts.password.reset');
    }

    public function update(Request $request) {
        $hasher = Sentinel::getHasher();

        $oldPassword = $request->old_password;
        $password = $request->password;
        $passwordConf = $request->password_confirmation;

        $user = Sentinel::getUser();

        if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
            Session::flash('error', 'Check input is correct.');
            return view('layouts.password.reset');
        }

        Sentinel::update($user, array('password' => $password));

        return redirect('login');
    }
}
