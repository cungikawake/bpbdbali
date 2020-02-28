<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use File;
use Intervention\Image\Facades\Image;
use Input;
use Sentinel;
class NewsController extends Controller
{
  public function __construct()
    {
        $this->middleware('role:admin-manager');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $menu = view('dashboard.menubar');
        $category = Category::get();
        $allNews = News::orderBy('created_at', 'desc')->get();

        $content = view('dashboard.news.news',compact('allNews','category'));
        return view('dashboard', compact('menu','content'));
    }
    public function addnews()
    {
        $menu = view('dashboard.menubar');
        $category = Category::get();
        $content = view('dashboard.news.add-news', compact('category'));
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
                'title' => 'required',
                'category_id' => 'required',
                'details' => 'required',
            ]);
         $data = array();
        if($request->schedule == 'on') {
            $data['schedule'] = 1;
        }
        $data['title'] = $request->title;
        $data['slug'] = str_slug($request->title);
        $data['category_id'] =   $request->category_id;        
        $data['details'] = $request->details;
        $data['source'] = $request->source;
      
        if ($request->breaking == 'on') {
            $data['breaking'] = 1;
        }
        if ($request->featured == 'on') {
            $data['featured'] = 1;
        }
        if ($request->slider == 'on') {
            $data['slider'] = 1;
        }
        $data['user_name'] = Sentinel::getUser()->first_name;
        $data['created_at'] = Carbon::now(); 
        $data['updated_at'] = Carbon::now(); 

        
        if($request->hasFile('image')){
            $image = $request->file('image');

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(850,500)->save($location);
            $data['image'] = $image_full_name;

            News::create($data);
            alert()->success('Good Job', 'Successfully added a post !!');
                return redirect('/add-news');
        }else{
            News::create($data);
            alert()->success('Good Job', 'Successfully added a post !!');
                return redirect('/add-news');
        }
    }


    public function editnews(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $category = Category::get();
        $menu = view('dashboard.menubar');
        $content = view('dashboard.news.edit-news',compact('news','category'));
        return view('dashboard', compact('menu','content'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        
        $id = $request->id;
        if($request->schedule == 'on') {
            $data['schedule'] = 1;
        }elseif($request->schedule == ''){
            $data['schedule'] = 0;
        }
        $data['title'] = $request->title;
        $data['slug'] = str_slug($request->title);
        $data['category_id'] = $request->category_id;        
        $image = $request->file('image');
        $data['details'] = $request->details;
        $data['source'] = $request->source;
      
        if ($request->breaking == 'on') {
            $data['breaking'] = 1;
        }elseif($request->breaking == ''){
            $data['breaking'] = 0;
        }
        if ($request->featured == 'on') {
            $data['featured'] = 1;
        }elseif($request->featured == ''){
            $data['featured'] = 0;
        }
        if ($request->slider == 'on') {
            $data['slider'] = 1;
        }elseif($request->slider == ''){
            $data['slider'] = 0;
        }
        $data['user_name'] = Sentinel::getUser()->first_name;
        $data['updated_at'] = Carbon::now(); 

          
           // Upload the new picture
           
        
        if($request->hasFile('image')){
            $image = $request->file('image');
           
                  // Delete the old picture
            $update = News::find($id);

            $update_path = public_path('images'). '/' .$update->image;
            
            if($update->image != null)
            {
                //unlink($update_path);
            }

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $location = public_path('images'). '/' . $image_full_name;
            Image::make($image)->resize(850,500)->save($location);
            $data['image'] = $image_full_name;

            $update->update($data);
         
                alert()->success('Good Job', 'Successfully Updated !!');
                return redirect('/news');
            }
        else {
            DB::table('news')->where('id', $id)->update($data);
            alert()->success('Good Job', 'Successfully Updated !!');
            return redirect('/news');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $news = News::find($id);

        $path = public_path('images'). '/' .$news->image;
         if($news->image == null)
            {
                $news->delete();
            }else{
                unlink($path);
            }

        $news->delete();
        alert()->success('Good Job', 'Successfully Deleted !!');
        return back();
    }


    public function publish($id)
    {
        News::where('id', $id)->update(['status' => 1]); 
        alert()->success('Good Job', 'Successfully Published !!');
        return back();
    }
    public function unpublish($id)
    {
        News::where('id', $id)->update(['status' => 0]); 
        alert()->success('Good Job', 'Successfully Unpublished !!');
        return back();
    }
}
