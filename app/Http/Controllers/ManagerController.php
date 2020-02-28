<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\News;
use App\Category;
use App\Video;
use App\ImageGallery;
use App\Subscriber;
class ManagerController extends Controller
{
	public function __construct()
    {
        $this->middleware('role:manager');

	}
 
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

        return view('manager', compact('menu','content'));
    }
    

}
