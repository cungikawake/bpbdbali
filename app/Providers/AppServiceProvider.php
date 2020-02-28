<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Gsetting;
use App\Social;
use App\News;
use App\Category;
use App\Video;
use App\Seo;
use App\Advertisement;
use Carbon\Carbon;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
       /**
        * Advetisement Code
        *
        */
        $Addvertise = Advertisement::where('status',1)->where('advert_size' , 5)->orderByRaw('RAND()')->take(1)->get();
            View::share('Addvertise', $Addvertise);
        $AddTop = Advertisement::where('status',1)->where('advert_size' , 3)->orderByRaw('RAND()')->take(1)->get();
            View::share('AddTop', $AddTop);
        $Addleft = Advertisement::where('status',1)->where('advert_size' , 4)->orderByRaw('RAND()')->take(1)->get();
            View::share('Addleft', $Addleft);
        $Addright = Advertisement::where('status',1)->where('advert_size' , 1)->orderByRaw('RAND()')->take(1)->get();
            View::share('Addright', $Addright);
        $Addright2 = Advertisement::where('status',1)->where('advert_size' , 2)->orderByRaw('RAND()')->take(1)->get();
            View::share('Addright2', $Addright2);

        $catMenu = Category::with('posts')->where('status',1)->orderby('position','asc')->get();

        $subMenu = array();
        foreach ($catMenu as $key => $value) {
            if($value->parent_id > 0){
               $subMenu[$value->parent_id][$value->id] = $value; 
            } 
        } 
        
        View::share('catMenu', $catMenu); 
        View::share('subMenu', $subMenu);

        // $videoMenu = Video::orderBy(DB::raw('RAND()'))->latest()->where('status',1)->paginate(3);
        $videoMenu = Video::latest()->where('status',1)->get();
        View::share('videoMenu',$videoMenu);
        
        $Gsetting = Gsetting::findOrFail(1);
        View::share('Gsetting', $Gsetting);
        
        /*News for breaking*/
        $news = News::where('status',1)->where('breaking',1)->whereDate('created_at',Carbon::today())->take(10)->latest()->get();
        View::share('news', $news);


        $popular = News::with('category')->limit(4)->where('status',1)
                    ->orderby('hit_count','desc')->get();
        View::share('popular', $popular);

        $gallery = News::with('category')->latest()->where('status',1)->paginate(9);
        View::share('gallery', $gallery);

        $newsForSeo = News::where('status',1)->get();
        View::share('newsForSeo', $newsForSeo);

        $Social = Social::where('status',1)->get();
        View::share('Social', $Social);

        $seoComment = Seo::findOrFail(1);
        View::share('seoComment', $seoComment);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
