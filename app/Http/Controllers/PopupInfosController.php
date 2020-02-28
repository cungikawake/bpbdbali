<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PopupInfos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PopupInfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = view('dashboard.menubar');
        $datas = PopupInfos::orderBy('created_at', 'desc')->get();

        $content = view('dashboard.popup_infos.index',compact('datas'));
        return view('dashboard', compact('menu','content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new PopupInfos;
        $menu = view('dashboard.menubar');
        $content = view('dashboard.popup_infos.form',compact('model'));
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
        $validator = Validator::make( $request->all(), [
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'url' => 'required',
                'status' => 'required',
                'start' => 'required',
                'finish' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }else{
            $data = new PopupInfos();
            $data->title = $request->title;
            $data->url = $request->url;
            $data->status = $request->status;
            $data->start = date('Y-m-d', strtotime($request->start));
            $data->finish = date('Y-m-d', strtotime($request->finish));

            $image = $request->image;
            $imageName = Str::slug($request->title, '-').'-'.date('dmYHis').rand(0, 99999).'.'.$image->guessExtension();
            $upload = $image->move(public_path('uploads/popup_infos'), $imageName);
            $data->image = $imageName;

            $data->save();

            return redirect()->route('popup_infos.index')->with('message', 'Berhasil tambah data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Delete
        $data = PopupInfos::findOrFail($id);
        
        $path = 'uploads/popup_infos/';
        if (file_exists(public_path($path.$data->image)) && !is_null($data->image) && $data->image != '') {
            $del_image = unlink(public_path($path.$data->image));
        }else{
            $del_image = true;
        }

        if ($del_image) {
            $data->delete();
            return redirect()->route('popup_infos.index')->with('message', 'Berhasil hapus data');
        }else{
            return redirect()->route('popup_infos.index')->with('message', 'Delete image error : '.$del_image);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = PopupInfos::findOrFail($id);
        $menu = view('dashboard.menubar');
        $content = view('dashboard.popup_infos.form',compact('model'));
        return view('dashboard', compact('menu','content'));
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
        $validator = Validator::make( $request->all(), [
                'title' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'url' => 'required',
                'status' => 'required',
                'start' => 'required',
                'finish' => 'required|date|after:start'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }else{
            $data = PopupInfos::findOrFail($id);
            $data->title = $request->title;
            $data->url = $request->url;
            $data->status = $request->status;
            $data->start = date('Y-m-d', strtotime($request->start));
            $data->finish = date('Y-m-d', strtotime($request->finish));

            if ($request->has('image')) {
                $path = 'uploads/popup_infos/';
                if (file_exists(public_path($path.$data->image)) && !is_null($data->image) && $data->image != '') {
                    $del_image = unlink(public_path($path.$data->image));
                }

                //Upload new image
                $image = $request->image;

                $imageName = Str::slug($request->title, '-').'-'.date('dmYHis').rand(0, 99999).'.'.$image->guessExtension();
                $upload = $image->move(public_path($path), $imageName);

                $data->image = $imageName;
            }

            $data->save();

            return redirect()->route('popup_infos.index')->with('message', 'Berhasil edit data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
