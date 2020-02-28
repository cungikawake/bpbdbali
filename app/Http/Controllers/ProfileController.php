<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\User;
use File;

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('role:admin-manager');
	}

    public function editProfile(){
    	$user = Sentinel::getUser();
		$data['content'] = view('dashboard.profile.index',compact('user'));
		$data['menu'] = view('dashboard.menubar');
        return view('dashboard', $data);
    }
    public function updateProfile(Request $request){
            $id = $request->id;
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $phone = $request->phone;
            
		$user = Sentinel::findUserById($id);
        Sentinel::update($user, array('first_name'=>$first_name, 'last_name'=>$last_name, 'phone'=> $phone));    
        alert()->success('Good Job', 'Successfully Updated !!');      
        return redirect()->back();
    }
    
    public function updatePass(Request $request){
        $hasher = Sentinel::getHasher();
        $oldPassword = $request->old_password;
        $password = $request->password;
        $passwordConf = $request->password_confirmation;
        $user = Sentinel::getUser();

        if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
            return back()->with('error', 'Password Donot match !!.');
        }
        Sentinel::update($user, array('password' => $password));
        alert()->success('Good Job', 'Successfully Updated !!');
        return redirect()->back();
    }

    public function profile(Request $request){
        $request->validate([
        'profile' => 'required | mimes:jpeg,jpg,png',
        ]);

    	$id = $request->id;
    	// $user = Sentinel::findUserById($id);
        $user = User::find($id);
    	if($request->hasFile('profile')){
            File::delete(public_path('images'). '/' .$user->profile);

            $image = $request->file('profile');
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(160,160)->save($location);
            $p = $image_full_name;
        
        // Sentinel::update($user, array('profile' => $p));
        $user->profile = $p;
        $user->update();
         alert()->success('Good Job', 'Successfully Uploaded !!');
         return redirect()->back();
        }
    }
}
