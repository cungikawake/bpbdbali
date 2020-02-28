<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\Advertisement;

class AdvertiseController extends Controller
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
        $data['menu'] = view('dashboard.menubar');
        $addvert =  Advertisement::latest()->get();
        $data['content'] = view('dashboard.advertisement.index',compact('addvert'));
        return view('dashboard',$data);
    }

    public function addAdvertise()
    {
        $menu = view('dashboard.menubar');
        $content = view('dashboard.advertisement.add-advertise');
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
                'advert_type' => 'required',
                'advert_size' => 'required',
                'title' => 'required',
                'val1' => 'required|mimes:png,jpg,jpeg,gif|max:2000'
            ]);

          $data['advert_type'] = $request->advert_type;
          $data['advert_size'] = $request->advert_size;
          $data['title'] = $request->title;
          $data['link'] = $request->link;
          $data['val2'] = $request->val2;
            

          $data['status'] = $request->status == 'on' ? '1' : '0';            

        if($request->hasFile('val1')){
            $image = $request->file('val1');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            if($request->advert_size == 1){
                Image::make($image)->resize(300,600)->save($location);   
            }elseif($request->advert_size == 2){
                Image::make($image)->resize(300,250)->save($location);   
            }
            elseif($request->advert_size == 3){
                Image::make($image)->resize(728,90)->save($location);   
            }
            elseif($request->advert_size == 4){
                Image::make($image)->resize(970,90)->save($location);   
            }
            elseif($request->advert_size == 5){
                Image::make($image)->resize(970,250)->save($location);   
            }

            $data['val1'] = $image_full_name;
        }

        Advertisement::create($data);
        alert()->success('Good Job', 'Successfully Inserted !!');
        return redirect()->back();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data['menu'] = view('dashboard.menubar');
        $advert  = Advertisement::find($id);
        $data['content'] = view('dashboard.advertisement.edit-advertise', compact('advert'));
        return view('dashboard', $data);
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
        $data['advert_size'] = $request->advert_size;
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $data['val2'] = $request->val2;
        $data['status'] = $request->status == 'on' ? '1' : '0';            

        if($request->hasFile('val1')){
            $image = $request->file('val1');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            if($request->advert_size == 1){
                Image::make($image)->resize(300,600)->save($location);   
            }
            elseif($request->advert_size == 2){
                Image::make($image)->resize(300,250)->save($location);   
            }
            elseif($request->advert_size == 3){
                Image::make($image)->resize(728,90)->save($location);   
            }
            elseif($request->advert_size == 4){
                Image::make($image)->resize(970,90)->save($location);   
            }
            elseif($request->advert_size == 5){
                Image::make($image)->resize(970,250)->save($location);   
            }
            $data['val1'] = $image_full_name;
        }

        $r = Advertisement::find($id);

        $update_path = public_path('images'). '/' .$r->val1;
         if($r->val1 != null){
        unlink($update_path);
         }
        $r->update($data);
        alert()->success('Good Job', 'Successfully Updated !!');
        return redirect()->route('advertise');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Advertisement::find($id);
        $path = public_path('images'). '/' . $data->val1;
        if($data->val1 == null)
            {
                $data->delete();
            }else{
                unlink($path);
            }

        $data->delete();
        alert()->success('Good Job', 'Successfully Delated !!');
        return redirect()->back();

    }
}
