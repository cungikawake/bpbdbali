<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;
use App\Seo;
use DB;
use Response;
use Illuminate\Support\Facades\Input;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');

    }

    public function social()
    {
        $menu = view('dashboard.menubar');
        $seo = Seo::findOrFail(1);
        $social = Social::all();
        $content = view('dashboard.social.index',compact('seo','social'));
        return view('dashboard', compact('menu','content'));
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
            $data = new Social();
            $data->name = $request->name;
            $data->code = $request->code;
            $data->link = $request->link;
            $data->status = $request->status;
            $data->save();
            return response()->json($data);

    }
    public function editItem($id)
    {
        $data = Social::find($id);
        return response()->json($data);
    }
    public function updateItem(Request $request, $id)
    {
        $data = Social::find($id);
        $data->name = $request->name;
        $data->code = $request->code;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->save();
        return response()->json($data);
    }
    public function deleteItem($id)
    {
       $d = Social::find($id)->delete();
        return response()->json($d);
    }
/*
    public function store(Request $request)
    {
    	$id = $request->id;
    	$social = $request->social;

    	foreach ($id as  $value) {
    		$item = $value-1;
			DB::table('socials')
            ->where('id', $value)
            ->update(['social' => $social[$item]]);
		}
		return redirect()->route('social')->with('message', 'Social Link Successfully Updated !!');
    }
*/

}
