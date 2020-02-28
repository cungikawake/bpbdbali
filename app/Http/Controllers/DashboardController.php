<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\News;
use App\Category;
use App\Video;
use App\ImageGallery;
use App\Subscriber;
use App\Theme;
class DashboardController extends Controller
{

  public function __construct()
    {
        $this->middleware('role:admin');

    }    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        $category = Category::all();
        
        $video = Video::all();
        $ImageGallery = ImageGallery::all();
        $subscriber = Subscriber::all();
        $todayNews = News::where('updated_at', '>=', Carbon::today())->get();

        $menu = view('dashboard.menubar');
        $content = view('dashboard.maincontent',compact('news', 'category', 'video', 'ImageGallery', 'subscriber','todayNews'));
        return view('dashboard', compact('menu','content'));
    }
    
   
    public function themeChoose(){
        $data['menu'] = view('dashboard.menubar');
        $theme = Theme::find(1);
        $data['content'] = view('dashboard.theme.index',compact('theme'));
        return view('dashboard', $data);
    }

    public function themeActive(Request $request){
        $theme = Theme::find(1);
        $theme->status = $request->status;
        $theme->save();

        alert()->success('Good Job', 'Theme  has been Changed !!');
        return back();
    }
}
