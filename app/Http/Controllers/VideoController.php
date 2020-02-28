<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
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
    public function index()
    {
        $menu = view('dashboard.menubar');

        $videos = Video::orderBy('created_at', 'desc')->get();
        $content = view('dashboard.videos.index',compact('videos'));
        return view('dashboard', compact('menu','content'));
    }

    public function addvideos()
    {
        $menu = view('dashboard.menubar');
        $content = view('dashboard.videos.add-videos');
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
            'url' => 'required',
            'link' => 'required',
        ]);

      $data = new Video();
      $data->title = $request->title;
      $data->slug = str_slug($request->title);
      $data->url = $request->url;
      $data->link = $request->link;
      $data->save();
        
        alert()->success('Good Job', 'Successfully added a Video !!');
        return redirect()->back();
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Video::findOrFail($id);
        $menu = view('dashboard.menubar');
        $content = view('dashboard.videos.edit-videos',compact('id'));
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
        $data = Video::find($request->id);
        $data->title = $request->title;
        $data->slug = str_slug($request->title);
        $data->url = $request->url;
        $data->link = $request->link;
        $data->update();
        alert()->success('Good Job', 'Successfully Updated !!');
        return redirect('videos');
    }

    public function destroy($id)
    {
        $category = Video::find($id);
        $category->delete();
        alert()->success('Good Job', 'Successfully Deleted !!');
        return back();
    }


    public function publish($id)
    {
        Video::where('id', $id)->update(['status' => 1]); 
        alert()->success('Good Job', 'Successfully Published !!');
          return back();
    }
    public function unpublish($id)
    {
        Video::where('id', $id)->update(['status' => 0]);
        alert()->success('Good Job', 'Successfully Unpublished !!'); 
          return back();
    }

}
