<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGallery;
use App\AllImage;
use Carbon\Carbon;
use DB;
class GalleryController extends Controller
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
        $imgTitles = ImageGallery::with('CountImage')->orderby('created_at','desc')->get();
        $menu = view('dashboard.menubar');
        $content = view('dashboard.gallery.index',compact('imgTitles'));
        return view('dashboard', compact('menu','content'));
    }

    public function addgallery(){
        $menu = view('dashboard.menubar');
        $content = view('dashboard.gallery.add-gallery');
        return view('dashboard', compact('menu','content'));   
    }

    public function editgallery()
    {
        $menu = view('dashboard.menubar');
        $content = view('dashboard.gallery.edit-gallery');
        return view('dashboard', compact('menu','content'));      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
         $title = ImageGallery::create($request->all());
        foreach ($request->image as $image) {
            $filename = $image->store('All_Image');
            AllImage::create([
                'title_id' => $title->id,
                'image' => $filename
            ]);
        }
        alert()->success('Good Job', 'Successfully Uploaded !!');
        return back();
    }

    public function mediaGallery()
    {
        $menu = view('dashboard.menubar');

        $AllImage = AllImage::latest()->get();
        $content = view('dashboard.gallery.media',compact('AllImage'));
        return view('dashboard', compact('menu','content'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = ImageGallery::with('CountImage')->findOrfail($id);
        return back()->with('message', 'Succesfully Deleted');
    }

    public function upload(Request $request)
    {
    	
    	$image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $upload_success = $image->move(public_path('images'),$imageName);
        dd( $upload_success);
        if ($upload_success) {
            return response()->json($upload_success, 200);
        }
        // Else, return error 400
        else {
            return response()->json('error', 400);
        }
    }
}
