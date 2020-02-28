<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gsetting;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use DB;
use File;
class GeneralSettingController extends Controller
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
        $Gsetting = Gsetting::findOrFail(1);
        $menu = view('dashboard.menubar');
        $content = view('dashboard.Gsettings.index',compact('Gsetting'));
        return view('dashboard', compact('menu','content'));
    }

    public function footer(Request $request){
        $data = Gsetting::find($request->id);
        $data->footer = $request->footer;
        $data->update();
        alert()->success('Good Job', 'Footer Successfully Updated !!');
        return redirect()->route('gsettings');
    }
    public function address(Request $request){
        $data = Gsetting::find($request->id);
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->fax = $request->fax;
        $data->email = $request->email;
        $data->update();
        alert()->success('Good Job', 'Office Address Successfully Updated !!');
        return redirect()->route('gsettings');
    }

    public function about(Request $request){
        $data = Gsetting::find($request->id);
        $data->about = $request->about;
        $data->update();
        alert()->success('Good Job', 'About us Successfully Updated !!');
        return redirect()->route('gsettings');
    }
    public function content(Request $request){
        $data = Gsetting::find($request->id);
        $data->title = $request->title;
        $data->populartag = $request->populartag;
        $data->update();

        alert()->success('Good Job', 'Web Content Successfully Updated !!');
        return redirect()->route('gsettings');
    }
    
    public function logo(Request $request){
        $id = $request->id;
        
        if($request->hasFile('logo')){
            $image = $request->file('logo');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->save($location);
            $data['logo'] = $image_full_name;
        }

        $r = Gsetting::find($id);
        $update_path = public_path('images'). '/' .$r->logo;
         if($update_path != null){
        File::delete($update_path);
         }
        $r->update($data);
        alert()->success('Good Job', 'Logo Successfully Updated !!');
        return redirect()->route('gsettings');
    }
    public function defaultImg(Request $request){
        $id = $request->id;
        
        if($request->hasFile('default_img')){
            $image = $request->file('default_img');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(60,60)->save($location);
            $data['default_img'] = $image_full_name;
        }

        $r = Gsetting::find($id);
        $update_path = public_path('images'). '/' .$r->default_img;
         if($update_path != null){
            unlink($update_path);
             }
        $r->update($data);
        alert()->success('Good Job', 'Favico.ico Successfully Updated !!');
        return redirect()->route('gsettings');
    }

    public function privacy(){
        $Gsetting = Gsetting::findOrFail(1);
        $menu = view('dashboard.menubar');
        $content = view('dashboard.seo.index',compact('Gsetting'));
        return view('dashboard', compact('menu','content'));
    }
    public function uprivacy(Request $request)
    {
        $data = Gsetting::find($request->id);
        $data->privacy = $request->privacy;
        $data->update();
        alert()->success('Good Job', 'Privacy Successfully Updated !!');
        return redirect('seo-settings');
    }
    
    public function sitemap(){
        $Gsetting = Gsetting::findOrFail(1);
        $menu = view('dashboard.menubar');
        $content = view('dashboard.seo.index',compact('Gsetting'));
        return view('dashboard', compact('menu','content'));
    }
    public function usiteMap(Request $request)
    {
        $data = Gsetting::find($request->id);
        $data->sitemap = $request->sitemap;
        $data->update();
        alert()->success('Good Job', 'Sitemap Successfully Updated !!');
        return redirect('seo-settings');
    }
}
