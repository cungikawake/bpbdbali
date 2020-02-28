<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Http\Response;
use DB;
use App\Cuaca;
use App\Category;
use App\News;
use App\Video;
use App\Gallery;

use App\Gsetting;
use App\Advertisement;
use Carbon\Carbon;
use App\AllImage;
use App\Theme;
use Illuminate\Support\Facades\Input;
use App\Slider;
use App\PopupInfos;

class HomeController extends Controller
{
    
    public function index()
    {
        

       /**
       *    Info peringatanCuacaExtream dan terkini
       **/ 
      $getPeringatan = Cuaca::where('id', 1)->first();
      $peringatanCuacaExtream = $getPeringatan->ekstrim; 
      $getGempaM5 = $getPeringatan->terkini; 
      $getGempaDirasakan = $getPeringatan->dirasakan;
      $peringatanCuacaTerkini = $getPeringatan->bandara;

        $title_info = "Cuaca Bali"; 
        

        
       /** 
        * Start Slider Code
        */
        $c = News::orderBy('updated_at','asc')->where('status',1)->where('slider',1)->count();
        $tk= 7; $skp = $c-$tk; $last = 2; $skp2 = $skp-$last; $one =1; $skp3 = $skp-$one;
            
        $slider = Slider::get();

        // $slider = News::orderBy('updated_at','asc')->where('status',1)->where('slider',1)
        //                 ->take($tk)->skip($skp)->get();
        // $slider2 = News::orderBy('updated_at','asc')->where('status',1)->where('slider',1)
        //                 ->take($one)->skip($skp3)->get();
        // $slider3 = News::orderBy('updated_at','asc')->where('status',1)->where('slider',1)
        //                 ->take($last)->skip($skp2)->get();
       /** 
        * End Slider Code
        */

       /** 
        * Start  Latest news Code
        */ 
        // $news = News::latest()->where('status',1)->where('featured',1)->where('updated_at', '>=', Carbon::today())->get();
        $news = News::with('category')->latest()->where('status',1)->where('featured',1)->get();

        $articles = News::with('category')->latest()->where('status',1)->where('category_id', 27)->get();
         

        /* Start For Category with news post Code in bootom section */
        $count = Category::count(); $take = 3; $skip =  $count - $take;
        $catNews = Category::with('posts')->orderBy('position','desc')->where('status',1)
                ->skip($skip)->take($take)->get();
        
        /* Start For Category with news post Code in left content section */
        $catN = 3; $lastSkip = $skip - $catN;
        $catNews2 = Category::with('posts')->orderBy('position','desc')
                    ->where('status',1)->take($catN)->skip($lastSkip)->get();
        
        /* Start For Video section*/
        $video = Video::all();
        
        /* THEME */
        $theme = Theme::first();

        if($theme->status == 1) {
            // $data['newsSlider'] = view('home.slider',compact('slider','slider2','slider3'));
            $data['newsSlider'] = view('home.slider',compact('slider'));
            $data['latestNews'] = view('home.latestNews',compact('news'));
            $data['follow-us'] = view('home.social');
            $data['popular'] = view('home.popular');
            $data['categoryNews'] = view('home.featur_catNews',compact('catNews'));    
            $data['lifeStyle'] = view('home.lifeStyle',compact('catNews2'));
            $data['video'] = view('home.video',compact('video'));
            $data['subscribe'] = view('home.subscribe');
            $data['addvert'] = view('home.addvert');
            return view('welcome', $data);   
        }elseif ($theme->status == 2) {
             
            $data2['follow-us'] = view('home2.social');
            $data2['addvert'] = view('home2.addvert');
            // $data2['newsSlider'] = view('home2.slider',compact('slider','slider3'));
            $data2['newsSlider'] = view('home2.slider',compact('slider'));
            $data2['popular'] = view('home2.popular');
            $data2['article'] = view('home2.article',compact('articles'));
            $data2['subscribe'] = view('home2.subscribe');
            $data2['lifeStyle'] = view('home2.lifeStyle',compact('catNews2'));
            
            $data2['latestNews'] = view('home2.latestNews',compact('news', 'peringatanCuacaExtream'));
            
            $data2['categoryNews'] = view('home2.featur_catNews',compact('catNews'));
            
            //$data2['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info')); 

            $data2['gempaDirasakan'] = view('home2.gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5')); 

            $data2['CuacaExtream'] = view('home2.peringatan-cuacaExtrem', compact('peringatanCuacaExtream')); 
            
            $data2['Infografy'] = view('home2.info_gunung'); 
            $data2['situsTerkait'] = view('home2.situs_terkait'); 
            $data2['widgetCuaca'] = view('home2.widgetCuaca'); 
            $data2['modal_info'] = view('home2.modal_info');

            return view('welcome2',$data2);   

        }elseif ($theme->status == 3) {
            // $view3['newsSlider'] = view('home3.slider',compact('slider','slider2','slider3'));
            $view3['newsSlider'] = view('home3.slider',compact('slider'));
            $view3['follow-us'] = view('home3.social');
            $view3['lifeStyle'] = view('home3.lifeStyle',compact('catNews2'));
            $view3['categoryNews'] = view('home3.featur_catNews',compact('catNews'));
            $view3['addvert'] = view('home3.addvert');
            $view3['popular'] = view('home3.popular');
            $view3['subscribe'] = view('home3.subscribe');
            return view('welcome3',$view3); 

        }elseif ($theme->status == 4) {
            $view4['categoryNews'] = view('home4.featur_catNews',compact('catNews')); 
            // $view4['newsSlider'] = view('home4.slider',compact('slider','slider2','slider3'));
            $view4['newsSlider'] = view('home4.slider',compact('slider'));
            $view4['lifeStyle'] = view('home4.lifeStyle',compact('catNews2'));
            $view4['follow-us'] = view('home4.social');
            $view4['popular'] = view('home4.popular');
            $view4['subscribe'] = view('home4.subscribe');
            $view4['addvert'] = view('home4.addvert');
            return view('welcome4',$view4);   
        }
    }
    
    public function category($id, $slug){
        $theme = Theme::find(1);
        $news = Category::with('posts')->latest()->where('id', $id)->where('status',1)->get();

        $articles = News::with('category')->latest()->where('status',1)->where('category_id', 27)->get();

        $getPeringatan = Cuaca::where('id', 1)->first();
        $peringatanCuacaExtream = $getPeringatan->ekstrim; 
        $getGempaM5 = $getPeringatan->terkini; 
        $getGempaDirasakan = $getPeringatan->dirasakan;
        $peringatanCuacaTerkini = $getPeringatan->bandara;

        $title_info = "Cuaca Bali"; 

        if($theme->status == 1){
            $data['catNews'] = view('home.category',compact('news'));
            $data['addvert'] = view('home.addvert');
            $data['follow-us'] = view('home.social');
            $data['popular'] = view('home.popular'); 
            $data['subscribe'] = view('home.subscribe');
            return view('welcome', $data);
        }elseif ($theme->status == 2){
            $data2['catNews'] = view('home2.category',compact('news'));
            $data2['addvert'] = view('home2.addvert');
            $data2['follow-us'] = view('home2.social');
            $data2['popular'] = view('home2.popular');
            $data2['article'] = view('home2.article',compact('articles')); 
            $data2['gempaDirasakan'] = view('home2.sidebar_gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5'));  
            $data2['Infografy'] = view('home2.info_gunung');
            $data2['subscribe'] = view('home2.subscribe');
            
            return view('welcome2', $data2);
        }elseif ($theme->status == 3) {
            $data3['addvert'] = view('home3.addvert');
            $data3['follow-us'] = view('home3.social');
            $data3['popular'] = view('home3.popular'); 
            $data3['subscribe'] = view('home3.subscribe');
            $data3['catNews'] = view('home3.category',compact('news'));
            return view('welcome3',$data3);   
        }elseif ($theme->status == 4) {
            $view4['follow-us'] = view('home4.social');
            $view4['popular'] = view('home4.popular');
            $view4['follow-us2'] = view('home4.follow-us');
            $view4['subscribe'] = view('home4.subscribe');
            $view4['addvert'] = view('home4.addvert');
            $view4['catNews'] = view('home4.category',compact('news'));
            return view('welcome4',$view4);   
        }
    }
    
    public function featuredArticle($id, $nslug){
        $theme = Theme::first();
        /*Start Hit Counter for popular post */
        $hitNews = News::findOrFail($id);
        $data = array();
        $data['hit_count'] = $hitNews->hit_count+1;
        News::where('id',$id)->update($data);
        /*Start Hit Counter for popular post */

        $news = News::with('category')->where('id',$id)->get();
        $latestNews = News::with('category')->latest()->where('status',1)->take(10)->get();
        $articles = News::with('category')->latest()->where('status',1)->where('category_id', 27)->get();

        $getPeringatan = Cuaca::where('id', 1)->first();
        $peringatanCuacaExtream = $getPeringatan->ekstrim; 
        $getGempaM5 = $getPeringatan->terkini; 
        $getGempaDirasakan = $getPeringatan->dirasakan;
        $peringatanCuacaTerkini = $getPeringatan->bandara;

        if($theme->status == 1) {
            $view['details'] = view('home.details',compact('news'));
            $view['addvert'] = view('home.addvert');
            $view['follow-us'] = view('home.social');
            $view['popular'] = view('home.popular'); 
            // $view['subscribe'] = view('home.subscribe');
            return view('welcome',$view);
        }elseif ($theme->status == 2) {
            $data2['details'] = view('home2.details',compact('news','latestNews'));
            $data2['addvert'] = view('home2.addvert');
            $data2['follow-us'] = view('home2.social');
            $data2['popular'] = view('home2.popular'); 
            $data2['subscribe'] = view('home2.subscribe');
            $data2['article'] = view('home2.article',compact('articles'));
            $data2['gempaDirasakan'] = view('home2.sidebar_gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5')); 
            $data2['Infografy'] = view('home2.info_gunung');
            return view('welcome2', $data2);
        }elseif ($theme->status == 3) {
            $data3['addvert'] = view('home3.addvert');
            $data3['follow-us'] = view('home3.social');
            $data3['popular'] = view('home3.popular'); 
            $data3['subscribe'] = view('home3.subscribe');
            $data3['tags'] = view('home3.tags',compact('news'));
            $data3['details'] = view('home3.details',compact('news','latestNews'));
            return view('welcome3', $data3);   
        }elseif ($theme->status == 4) {
            $view4['details'] = view('home4.details',compact('news','latestNews'));
            $view4['follow-us'] = view('home4.social');
            $view4['follow-us2'] = view('home4.follow-us');
            $view4['popular'] = view('home4.popular');
            $view4['subscribe'] = view('home4.subscribe');
            $view4['addvert'] = view('home4.addvert');
            return view('welcome4',$view4);   
        }

    }
    public function article($id, $slug, $newsid, $title){
        $theme = Theme::first();
        /*Start Hit Counter for popular post */
        $hitNews = News::findOrFail($newsid);
        $data = array();
        $data['hit_count'] = $hitNews->hit_count+1;
        News::where('id',$newsid)->update($data);
        /*Start Hit Counter for popular post */
        $news = News::with('category')->where('id',$newsid)->get();
        $latestNews = News::with('category')->latest()->where('status',1)->take(10)->get();

        $articles = News::with('category')->latest()->where('status',1)->where('category_id', 27)->get();

        $getPeringatan = Cuaca::where('id', 1)->first();
        $peringatanCuacaExtream = $getPeringatan->ekstrim; 
        $getGempaM5 = $getPeringatan->terkini; 
        $getGempaDirasakan = $getPeringatan->dirasakan;
        $peringatanCuacaTerkini = $getPeringatan->bandara;

        $title_info = "Cuaca Bali"; 

        if($theme->status == 1) {
            $view['details'] = view('home.details',compact('news'));
            $view['addvert'] = view('home.addvert');
            $view['follow-us'] = view('home.social');
            $view['popular'] = view('home.popular'); 
            // $view['subscribe'] = view('home.subscribe');
            return view('welcome',$view);
        }elseif ($theme->status == 2) {
            $view2['details'] = view('home2.details',compact('news','latestNews'));
            $view2['addvert'] = view('home2.addvert');
            $view2['follow-us'] = view('home2.social');
            $view2['popular'] = view('home2.popular'); 
            $view2['article'] = view('home2.article',compact('articles')); 
            $view2['gempaDirasakan'] = view('home2.sidebar_gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5')); 
            $view2['Infografy'] = view('home2.info_gunung');
            $view2['subscribe'] = view('home2.subscribe');
            return view('welcome2',$view2);
        }elseif ($theme->status == 3) {
            $view3['details'] = view('home3.details',compact('news','latestNews'));
            $view3['addvert'] = view('home3.addvert');
            $view3['follow-us'] = view('home3.social');
            $view3['popular'] = view('home3.popular'); 
            $view3['subscribe'] = view('home3.subscribe');
            return view('welcome3',$view3);   
        }elseif ($theme->status == 4) {
            $view4['details'] = view('home4.details',compact('news','latestNews'));
            $view4['follow-us'] = view('home4.social');
            $view4['popular'] = view('home4.popular');
            $view4['follow-us2'] = view('home4.follow-us');
            $view4['subscribe'] = view('home4.subscribe');
            $view4['addvert'] = view('home4.addvert');
            return view('welcome4',$view4);   
        }
    }

    /*
    public function videos($id, $title)
    {
        $theme = Theme::first();
        $Video = Video::where('id',$id)->get();

        if($theme->status == 1) {
            $view['video'] = view('home.videodetails',compact('Video'));
            $view['addvert'] = view('home.addvert');
            $view['follow-us'] = view('home.social');
            $view['popular'] = view('home.popular'); 
            // $view['subscribe'] = view('home.subscribe');
            return view('welcome',$view);
        }elseif($theme->status == 2) {
            $view2['videodetails'] = view('home2.videodetails',compact('Video'));
            $view2['addvert'] = view('home2.addvert');
            $view2['follow-us'] = view('home2.social');
            $view2['subscribe'] = view('home2.subscribe');
            return view('welcome2',$view2);
        }elseif ($theme->status == 3) {
            $view3['videodetails'] = view('home3.videodetails',compact('Video'));
            $view3['addvert'] = view('home3.addvert');
            $view3['follow-us'] = view('home3.social');
            $view3['subscribe'] = view('home3.subscribe');
            return view('welcome3',$view3);   
        }elseif ($theme->status == 4) {
            $view4['videodetails'] = view('home4.videodetails',compact('Video'));
            $view4['addvert'] = view('home4.addvert');
            $view4['follow-us'] = view('home4.social');
            $view4['subscribe'] = view('home4.subscribe');
            return view('welcome4',$view4);   
        }
    }
    */

    public function videos()
    {
        $theme = Theme::first();
        $Video = Video::orderBy('created_at', 'Desc')->paginate(10); 
        //$news = Category::with('posts')->latest()->where('id', $id)->where('status',1)->get();

        $articles = News::with('category')->latest()->where('status',1)->where('category_id', 27)->get();

        $getPeringatan = Cuaca::where('id', 1)->first();
        $peringatanCuacaExtream = $getPeringatan->ekstrim; 
        $getGempaM5 = $getPeringatan->terkini; 
        $getGempaDirasakan = $getPeringatan->dirasakan;
        $peringatanCuacaTerkini = $getPeringatan->bandara;
        
        if($theme->status == 1) {
            $view['video'] = view('home.videodetails',compact('Video'));
            $view['addvert'] = view('home.addvert');
            $view['follow-us'] = view('home.social');
            $view['popular'] = view('home.popular'); 
            // $view['subscribe'] = view('home.subscribe');
            return view('welcome',$view);
        }elseif($theme->status == 2) { 
            
            $view2['video'] = view('home2.videodetails',compact('Video'));
            $view2['addvert'] = view('home2.addvert');
            $view2['follow-us'] = view('home2.social');
            $view2['popular'] = view('home2.popular');
            $view2['article'] = view('home2.article',compact('articles')); 
            $view2['gempaDirasakan'] = view('home2.sidebar_gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5'));  
            $view2['Infografy'] = view('home2.info_gunung');
            $view2['subscribe'] = view('home2.subscribe');
            return view('welcome2',$view2);
        }elseif ($theme->status == 3) {
            $view3['videodetails'] = view('home3.videodetails',compact('Video'));
            $view3['addvert'] = view('home3.addvert');
            $view3['follow-us'] = view('home3.social');
            $view3['subscribe'] = view('home3.subscribe');
            return view('welcome3',$view3);   
        }elseif ($theme->status == 4) {
            $view4['videodetails'] = view('home4.videodetails',compact('Video'));
            $view4['addvert'] = view('home4.addvert');
            $view4['follow-us'] = view('home4.social');
            $view4['subscribe'] = view('home4.subscribe');
            return view('welcome4',$view4);   
        }
    }

    public function foto()
    {
        $theme = Theme::first();
        $Fotos = Gallery::orderBy('created_at', 'Desc')->paginate(10); 
        //$news = Category::with('posts')->latest()->where('id', $id)->where('status',1)->get();

        $articles = News::with('category')->latest()->where('status',1)->where('category_id', 27)->get();

        $getPeringatan = Cuaca::where('id', 1)->first();
        $peringatanCuacaExtream = $getPeringatan->ekstrim; 
        $getGempaM5 = $getPeringatan->terkini; 
        $getGempaDirasakan = $getPeringatan->dirasakan;
        $peringatanCuacaTerkini = $getPeringatan->bandara;
        
        if($theme->status == 1) {
            $view['video'] = view('home.videodetails',compact('Video'));
            $view['addvert'] = view('home.addvert');
            $view['follow-us'] = view('home.social');
            $view['popular'] = view('home.popular'); 
            // $view['subscribe'] = view('home.subscribe');
            return view('welcome',$view);
        }elseif($theme->status == 2) { 
             
            $view2['video'] = view('home2.foto',compact('Fotos'));
            $view2['addvert'] = view('home2.addvert');
            $view2['follow-us'] = view('home2.social');
            $view2['popular'] = view('home2.popular');
            $view2['article'] = view('home2.article',compact('articles')); 
            $view2['gempaDirasakan'] = view('home2.sidebar_gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5'));  
            $view2['Infografy'] = view('home2.info_gunung');
            $view2['subscribe'] = view('home2.subscribe');
            return view('welcome2',$view2);
        }elseif ($theme->status == 3) {
            $view3['videodetails'] = view('home3.videodetails',compact('Video'));
            $view3['addvert'] = view('home3.addvert');
            $view3['follow-us'] = view('home3.social');
            $view3['subscribe'] = view('home3.subscribe');
            return view('welcome3',$view3);   
        }elseif ($theme->status == 4) {
            $view4['videodetails'] = view('home4.videodetails',compact('Video'));
            $view4['addvert'] = view('home4.addvert');
            $view4['follow-us'] = view('home4.social');
            $view4['subscribe'] = view('home4.subscribe');
            return view('welcome4',$view4);   
        }
    }

    public function aboutUs()
    {
        $theme = Theme::first();
        if($theme->status == 1) {
            $view['about'] = view('home.about');
            $view['addvert'] = view('home.addvert');
            $view['follow-us'] = view('home.social');
            return view('welcome',$view);
        }elseif ($theme->status == 2) {
            $view2['about'] = view('home2.about');
            $view2['addvert'] = view('home2.addvert');
            $view2['follow-us'] = view('home2.social');
            return view('welcome2',$view2);
        }elseif ($theme->status == 3) {
            $view3['about'] = view('home3.about');
            $view3['addvert'] = view('home3.addvert');
            $view3['follow-us'] = view('home3.social');
            return view('welcome3',$view3);   
        }elseif ($theme->status == 4) {
            $view4['about'] = view('home4.about');
            $view4['addvert'] = view('home4.addvert');
            $view4['follow-us'] = view('home4.social');
            return view('welcome4',$view4);   
        }
    }
    public function contactUs(){
        $theme = Theme::first();

        if($theme->status == 1) {
            $view['contact'] = view('home.contact');
            $view['addvert'] = view('home.addvert');
            $view['follow-us'] = view('home.social');
            $view['popular'] = view('home.popular'); 
            // $view['subscribe'] = view('home.subscribe');
            return view('welcome', $view);
        }elseif ($theme->status == 2) {
            $view2['contact'] = view('home2.contact');
            $view2['addvert'] = view('home2.addvert');
            $view2['follow-us'] = view('home2.social');
            // $view2['popular'] = view('home2.popular'); 
            $view2['subscribe'] = view('home2.subscribe');
            return view('welcome2', $view2);
        }elseif ($theme->status == 3) {
            $view3['about'] = view('home3.contact');
            $view3['addvert'] = view('home3.addvert');
            $view3['follow-us'] = view('home3.social');
            $view3['subscribe'] = view('home3.subscribe');
            return view('welcome3',$view3);   
        }elseif ($theme->status == 4) {
            $view4['about'] = view('home4.contact');
            $view4['addvert'] = view('home4.addvert');
            $view4['follow-us'] = view('home4.social');
            $view4['subscribe'] = view('home4.subscribe');
            return view('welcome4',$view4);   
        }
    }
    public function submitContact(Request $request)
    {
        $gsetting = Gsetting::first();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);


        $to = $gsetting->email;
        $subject = $request->subject;
        $msg = $request->message;
        $name = $request->name;
        $email = $request->email;

        $headers = "From: $name <$email> \r\n";
        $headers .= "Reply-To: $name <$email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "X-Mailer: PHP/".phpversion();
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = "
                    <html>
                    <head>
                    <title>Contact Message</title>
                    </head>
                    <body>
                    <p>$msg</p>
                    </body>
                    </html>
                    ";
        if (mail($to, $subject, $message, $headers)) {
            alert()->success('Success', 'Message send.');
            return redirect()->back();
        } else {
            alert()->error('Failed', 'Message not send');
        }
    }
    public function privacy()
    {
        $theme = Theme::first();
        if($theme->status == 1) {
            $view['privacy'] = view('home.privacy');
            $view['addvert'] = view('home.addvert');
            $view['follow-us'] = view('home.social');
            return view('welcome',$view);
        }elseif ($theme->status == 2) {
            $view2['privacy'] = view('home2.privacy');
            $view2['addvert'] = view('home2.addvert');
            $view2['follow-us'] = view('home2.social');
            return view('welcome2',$view2);
        }elseif ($theme->status == 3) {
            $view3['privacy'] = view('home3.privacy');
            $view3['addvert'] = view('home3.addvert');
            $view3['follow-us'] = view('home3.social');
            return view('welcome3',$view3);   
        }elseif ($theme->status == 4) {
            $view4['privacy'] = view('home4.privacy');
            $view4['addvert'] = view('home4.addvert');
            $view4['follow-us'] = view('home4.social');
            return view('welcome4',$view4);   
        }   
    }

    public function sitemap()
    {
        $theme = Theme::first();
        if($theme->status == 1) {
            $view['sitemap'] = view('home.sitemap');
            $view['addvert'] = view('home.addvert');
            $view['follow-us'] = view('home.social');
            return view('welcome',$view);
        }elseif ($theme->status == 2) {
            $view2['sitemap'] = view('home2.sitemap');
            $view2['addvert'] = view('home2.addvert');
            $view2['follow-us'] = view('home2.social');
            return view('welcome2',$view2);
        }elseif ($theme->status == 3) {
            $view3['sitemap'] = view('home3.sitemap');
            $view3['addvert'] = view('home3.addvert');
            $view3['follow-us'] = view('home3.social');
            return view('welcome3',$view3);   
        }elseif ($theme->status == 4) {
            $view4['sitemap'] = view('home4.sitemap');
            $view4['addvert'] = view('home4.addvert');
            $view4['follow-us'] = view('home4.social');
            return view('welcome4',$view4);   
        }
    }
    public function clickadd($id){
        $hitNews = Advertisement::findOrFail($id);
        $data = array();
        $data['hit'] = $hitNews->hit+1;
        Advertisement::where('id',$id)->update($data);

        $go = $hitNews->link;
        return redirect($go);
    }

    public function ajaxData(Request $request)
    {
        $data = News::select("title as name")
                        ->where("title","LIKE","%{$request->input('query')}%")
                        ->get();
        return response()->json($data);
    }

    public function search()
    {
        $theme = Theme::first();
         $searchterm = Input::get('searchinput');
          if ($searchterm) {

            $news = News::where('status',1)->where('title', 'LIKE', '%' . $searchterm . '%')
                    ->orWhere('source', 'LIKE', '%' . $searchterm . '%')
                    ->paginate(10);
            
            $articles = News::with('category')->latest()->where('status',1)->where('category_id', 27)->get();
            if($theme->status == 1) {
                $data['search'] = view('home.search',compact('news'));
                $data['addvert'] = view('home.addvert');
                $data['follow-us'] = view('home.social');
                $data['popular'] = view('home.popular'); 
                return view('welcome', $data);
            }
            elseif($theme->status == 2) {
                $data2['search'] = view('home2.search',compact('news'));
                $data2['addvert'] = view('home2.addvert');
                $data2['follow-us'] = view('home2.social');
                $data2['popular'] = view('home2.popular'); 
                $data2['article'] = view('home2.article',compact('articles')); 
                return view('welcome2', $data2);
            }
            elseif($theme->status == 3) {
                $data3['search'] = view('home3.search',compact('news'));
                $data2['addvert'] = view('home3.addvert');
                $data3['follow-us'] = view('home3.social');
                $data3['popular'] = view('home3.popular'); 
                return view('welcome3', $data3);
            }
            elseif($theme->status == 4) {
                $data4['search'] = view('home4.search',compact('news'));
                $data4['addvert'] = view('home4.addvert');
                $data4['follow-us'] = view('home4.social');
                $data4['popular'] = view('home4.popular'); 
                return view('welcome4', $data4);
            }
        }
    }

    public function cuacaBali(){
        $getPeringatan = Cuaca::where('id', 1)->first();
        $peringatanCuacaExtream = $getPeringatan->ekstrim; 
        $getGempaM5 = $getPeringatan->terkini; 
        $getGempaDirasakan = $getPeringatan->dirasakan;
        $peringatanCuacaTerkini_cron = $getPeringatan->cuaca;

        $cuacaToday = new Cuaca;
        $peringatanCuacaTerkini = $cuacaToday->getCuacaTerkini();

        $theme = Theme::find(1);
        $title_info = "Cuaca Bali";  

        if($theme->status == 1){
            //$data['catNews'] = view('home.category',compact('news'));
            $data['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            $data['addvert'] = view('home.addvert');
            $data['follow-us'] = view('home.social');
            $data['popular'] = view('home.popular'); 
            $data['subscribe'] = view('home.subscribe');
            return view('welcome', $data);
        }elseif ($theme->status == 2){
            //$data2['catNews'] = view('home2.category',compact('news'));
            //$data2['addvert'] = view('home2.addvert');
            $data2['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info')); 
            //$data2['gempaDirasakan'] = view('home2.sidebar_gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5')); 
            $data2['Infografy'] = view('home2.info_gunung');
            $data2['follow-us'] = view('home2.social');
            $data2['popular'] = view('home2.popular'); 
            $data2['subscribe'] = view('home2.subscribe');
            return view('welcome2', $data2);
        }elseif ($theme->status == 3) {
            $data3['addvert'] = view('home3.addvert');
            $data3['follow-us'] = view('home3.social');
            $data3['popular'] = view('home3.popular'); 
            $data3['subscribe'] = view('home3.subscribe');
            //$data3['catNews'] = view('home3.category',compact('news'));
            $data3['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            return view('welcome3',$data3);   
        }elseif ($theme->status == 4) {
            $view4['follow-us'] = view('home4.social');
            $view4['popular'] = view('home4.popular');
            $view4['follow-us2'] = view('home4.follow-us');
            $view4['subscribe'] = view('home4.subscribe');
            $view4['addvert'] = view('home4.addvert');
            //$view4['catNews'] = view('home4.category',compact('news'));
            $view4['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            return view('welcome4',$view4);   
        }
    }

    public function cuacaPelabuhan(){
        $getPeringatan = Cuaca::where('id', 1)->first();
        $peringatanCuacaExtream = $getPeringatan->ekstrim; 
        $getGempaM5 = $getPeringatan->terkini; 
        $getGempaDirasakan = $getPeringatan->dirasakan;
        $peringatanCuacaTerkini = $getPeringatan->pelabuhan;

        $theme = Theme::find(1);
        $title_info = "Cuaca Pelabuhan Bali";  

        if($theme->status == 1){
            //$data['catNews'] = view('home.category',compact('news'));
            $data['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            $data['addvert'] = view('home.addvert');
            $data['follow-us'] = view('home.social');
            $data['popular'] = view('home.popular'); 
            $data['subscribe'] = view('home.subscribe');
            return view('welcome', $data);
        }elseif ($theme->status == 2){
            //$data2['catNews'] = view('home2.category',compact('news'));
            $data2['addvert'] = view('home2.addvert');
            $data2['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info')); 
            $data2['follow-us'] = view('home2.social');
            $data2['popular'] = view('home2.popular'); 
            $data2['subscribe'] = view('home2.subscribe');
            $data2['gempaDirasakan'] = view('home2.sidebar_gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5')); 
            $data2['Infografy'] = view('home2.info_gunung');
            return view('welcome2', $data2);
        }elseif ($theme->status == 3) {
            $data3['addvert'] = view('home3.addvert');
            $data3['follow-us'] = view('home3.social');
            $data3['popular'] = view('home3.popular'); 
            $data3['subscribe'] = view('home3.subscribe');
            //$data3['catNews'] = view('home3.category',compact('news'));
            $data3['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            return view('welcome3',$data3);   
        }elseif ($theme->status == 4) {
            $view4['follow-us'] = view('home4.social');
            $view4['popular'] = view('home4.popular');
            $view4['follow-us2'] = view('home4.follow-us');
            $view4['subscribe'] = view('home4.subscribe');
            $view4['addvert'] = view('home4.addvert');
            //$view4['catNews'] = view('home4.category',compact('news'));
            $view4['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            return view('welcome4',$view4);   
        }
    }

    public function cuacaBandara(){
        $getPeringatan = Cuaca::where('id', 1)->first();
        $peringatanCuacaExtream = $getPeringatan->ekstrim; 
        $getGempaM5 = $getPeringatan->terkini; 
        $getGempaDirasakan = $getPeringatan->dirasakan;
        $peringatanCuacaTerkini = $getPeringatan->bandara; 

        $theme = Theme::find(1);
         
        $title_info = "Cuaca Bandara Bali";   

        if($theme->status == 1){
            //$data['catNews'] = view('home.category',compact('news'));
            $data['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            $data['addvert'] = view('home.addvert');
            $data['follow-us'] = view('home.social');
            $data['popular'] = view('home.popular'); 
            $data['subscribe'] = view('home.subscribe');
            return view('welcome', $data);
        }elseif ($theme->status == 2){
            //$data2['catNews'] = view('home2.category',compact('news'));
            $data2['addvert'] = view('home2.addvert');
            $data2['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info')); 
            $data2['follow-us'] = view('home2.social');
            $data2['popular'] = view('home2.popular'); 
            $data2['subscribe'] = view('home2.subscribe');
            $data2['gempaDirasakan'] = view('home2.sidebar_gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5')); 
            $data2['Infografy'] = view('home2.info_gunung');

            return view('welcome2', $data2);
        }elseif ($theme->status == 3) {
            $data3['addvert'] = view('home3.addvert');
            $data3['follow-us'] = view('home3.social');
            $data3['popular'] = view('home3.popular'); 
            $data3['subscribe'] = view('home3.subscribe');
            //$data3['catNews'] = view('home3.category',compact('news'));
            $data3['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            return view('welcome3',$data3);   
        }elseif ($theme->status == 4) {
            $view4['follow-us'] = view('home4.social');
            $view4['popular'] = view('home4.popular');
            $view4['follow-us2'] = view('home4.follow-us');
            $view4['subscribe'] = view('home4.subscribe');
            $view4['addvert'] = view('home4.addvert');
            //$view4['catNews'] = view('home4.category',compact('news'));
            $view4['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            return view('welcome4',$view4);   
        }
    }

    public function gempaTerkini(){
        $getPeringatan = Cuaca::where('id', 1)->first();
        $peringatanCuacaExtream = $getPeringatan->ekstrim; 
        $getGempaM5 = $getPeringatan->terkini; 
        $getGempaDirasakan = $getPeringatan->dirasakan;

        $theme = Theme::find(1);
        $getPeringatan = new Cuaca; 
        $peringatanCuacaTerkini = $getPeringatan->getGempaTerkini(); 
        $title_info = "Gempa Terniki";  

        if($theme->status == 1){
            //$data['catNews'] = view('home.category',compact('news'));
            $data['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            $data['addvert'] = view('home.addvert');
            $data['follow-us'] = view('home.social');
            $data['popular'] = view('home.popular'); 
            $data['subscribe'] = view('home.subscribe');
            return view('welcome', $data);
        }elseif ($theme->status == 2){
            //$data2['catNews'] = view('home2.category',compact('news'));
            $data2['addvert'] = view('home2.addvert');
            $data2['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info')); 
            $data2['follow-us'] = view('home2.social');
            $data2['popular'] = view('home2.popular'); 
            $data2['subscribe'] = view('home2.subscribe');
            $data2['gempaDirasakan'] = view('home2.sidebar_gempaDirasakan', compact('getGempaDirasakan', 'getGempaM5')); 
            $data2['Infografy'] = view('home2.info_gunung');
            return view('welcome2', $data2);
        }elseif ($theme->status == 3) {
            $data3['addvert'] = view('home3.addvert');
            $data3['follow-us'] = view('home3.social');
            $data3['popular'] = view('home3.popular'); 
            $data3['subscribe'] = view('home3.subscribe');
            //$data3['catNews'] = view('home3.category',compact('news'));
            $data3['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            return view('welcome3',$data3);   
        }elseif ($theme->status == 4) {
            $view4['follow-us'] = view('home4.social');
            $view4['popular'] = view('home4.popular');
            $view4['follow-us2'] = view('home4.follow-us');
            $view4['subscribe'] = view('home4.subscribe');
            $view4['addvert'] = view('home4.addvert');
            //$view4['catNews'] = view('home4.category',compact('news'));
            $view4['cuacaToday'] = view('home2.cuacaToday', compact('peringatanCuacaTerkini', 'title_info'));
            return view('welcome4',$view4);   
        }
    }

    public function popup(Request $request)
    {
        $popup = PopupInfos::whereRaw('? between start and finish', [date('Y-m-d')])->where('status', 1)->orderBy('created_at', 'desc')->first();
        // $popup = PopupInfos::where('start', '<=', date('Y-m-d'))->where('finish', '>=', date('Y-m-d'))->where('status', 1)->orderBy('created_at', 'desc')->first();

        return response()->json(
            [
            'response'  => 'success',
            'data'      =>  $popup
            ]
        );
    }
}
