<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;  
use Sentinel;
use Activation;
use Session;
use View;
class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = view('dashboard.menubar');
        $users = Sentinel::getUserRepository()->with('roles','activations')->get();
        $content = view('dashboard.staffs.index',compact('users'));
        return view('dashboard', compact('menu','content'));
    }

    public function addstaffs()
    {
        $menu = view('dashboard.menubar');
        $roles = Sentinel::getRoleRepository()->get();
        $content = view('dashboard.staffs.add-staffs',compact('roles'));
        return view('dashboard', compact('menu','content'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'password' => 'required|min:6|confirmed',
            ]);

        $data = array();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = $request->password;
        $role = $request->role;


        $user = Sentinel::registerAndActivate($data);
        $user->roles()->attach($role); 
        alert()->success('Good Job', 'Thank you for registration !!');
        return redirect()->back();
    }

    


    public function edit($id)
    { 
        $user = Sentinel::findById($id);
        $menu = view('dashboard.menubar');
        $roles = Sentinel::getRoleRepository()->get();
        $content = view('dashboard.staffs.edit-staffs',compact('roles', 'user'));
        return view('dashboard', compact('menu','content'));      
    }
    
 

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            
            $id = $request->id;
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $email = $request->email;
            $phone = $request->phone;
            
$user = Sentinel::findUserById($id);
        Sentinel::update($user, array('first_name'=>$first_name, 'last_name'=>$last_name, 'email' => $email, 'phone'=> $phone));     
        alert()->success('Good Job', 'Successfully Updated !!');     
        return redirect('/staffs');
    }

    public function updateRole(Request $request)
    {
        $id = $request->id;   
        $role = $request->role;
        $user = Sentinel::findUserById($id);
        // $user->roles()->attach($role);  
      
        if ($role) {
            // Get the user roles
            $userRoles = $user->roles->first();
            // dd($userRoles);

            // Detach the user roles
            if (! empty($userRoles)) {
                $user->roles()->detach($userRoles);
            }

            // Attach the user roles
            if (! empty($role)) {
                $user->roles()->attach($role);
            }
        }

alert()->success('Good Job', 'Successfully Updated !!');
        return redirect('/staffs'); 
    }
    public function updatePass(Request $request)
    {
        $id = $request->id;
        $password = $request->password;
        $passConf = $request->password_confirmation;
        if($password != $passConf){
            return back()->with('message', 'password donot match!!');
        }
        $user = Sentinel::findUserById($id);
        Sentinel::update($user, array('password' => $password));

        alert()->success('Good Job', 'Successfully Updated !!');
        return redirect('/staffs');
    }
    public function changPass(Request $request)
    {
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

        return redirect('/staffs');   
    }


    public function publish($id){
     $user = Sentinel::findById($id);   
     $credentials = [
            'status' => 1,
        ];
    $user->status = 1;
    $user->update();
     Sentinel::update($user, $credentials);
     alert()->success('Good Job', 'Successfully Activated !!');
        return back();
    }

    public function unpublish($id){
        $user = Sentinel::findById($id);   
     $credentials = [
            'status' => 0,
        ];

     Sentinel::update($user, $credentials);
     alert()->success('Good Job', 'Successfully Deactivated !!');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Sentinel::findById($id);
        $d->delete();
        alert()->success('Good Job', 'Successfully Deleted !!');
        return back();
    }
    
  
 
    
}
