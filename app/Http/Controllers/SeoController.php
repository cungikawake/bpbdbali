<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seo;

class SeoController extends Controller
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
        $seo = Seo::findOrFail(1);
        $content = view('dashboard.seo.index',compact('seo'));
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
        // $analytics = $request->all();
         $analytics = Seo::find($request->id);
        $analytics->analytics = $request->analytics;
        $analytics->update();
        alert()->success('Good Job', 'Successfully Updated !!');
        return redirect('/seo-settings');
    }
    public function update(Request $request)
    {
        $analytics = Seo::find($request->id);
        $analytics->metakeyword = $request->metakeyword;
        $analytics->update();
        alert()->success('Good Job', 'Successfully Updated !!');
        return redirect('/seo-settings');
    }
    public function fbcomment(Request $request)
    {
        $fbcomment = Seo::find($request->id);
        $fbcomment->fbcomment = $request->fbcomment;
        $fbcomment->siteurl = $request->siteurl;
        $fbcomment->update();
        alert()->success('Good Job', 'Successfully Updated !!');
        return redirect('/seo-settings');
    }

}
