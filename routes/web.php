<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Start Frontend Controller */
Route::get('/cron/cuacaextrem', 'CronController@CuacaExtrem');
Route::get('/cron/cuacaterkini', 'CronController@CuacaTerkini');  
Route::get('/', 'HomeController@index');
Route::get('/v/{id}/{slug}', 'HomeController@category');
Route::get('/cuaca-bali', 'HomeController@cuacaBali');
Route::get('/cuaca-pelabuhan', 'HomeController@cuacaPelabuhan');
Route::get('/cuaca-bandara', 'HomeController@cuacaBandara');
Route::get('/gempa-terkini', 'HomeController@gempaTerkini');
Route::get('/article/{id}/{title}', 'HomeController@featuredArticle');
Route::get('/videos/{id}/{title}', 'HomeController@videos');
Route::get('/popup', 'HomeController@popup')->name('popup');
Route::get('/gallery/videos', 'HomeController@videos');
Route::get('/gallery/foto', 'HomeController@foto');

Route::get('/v/{id}/{slug}/article/{newsid}/{nslug}', 'HomeController@article');
Route::get('/about-us', 'HomeController@aboutUs');
Route::get('/contact-us', 'HomeController@contactUs');
Route::post('/contact-us-save',['as'=>'contact','uses'=>'HomeController@submitContact']);
Route::get('/privacy', 'HomeController@privacy');
Route::get('/site-map', 'HomeController@sitemap');
Route::get('/click-add/{id}', 'HomeController@clickadd');

Route::get('/autocomplete-ajax', ['uses'=>'HomeController@ajaxData', 'as'=>'autocomplete.ajax']);
Route::get('/search', ['uses'=>'HomeController@search', 'as'=>'search.data']);

/* End Frontend Controller */

Route::get('/manager', 'ManagerController@index');
Route::get('/admin',['uses'=> 'DashboardController@index','as'=>'main']);

/* Category Controller Start */
Route::get('/category',['uses' =>'CategoryController@index', 'as'=>'category' ]);
Route::get('/add-category',['uses' =>'CategoryController@addcat','as'=>'addcat']);
Route::post('/add-category',['uses'=>'CategoryController@saveCat','as'=>'saveCat']);
Route::get('/sub_category',['uses' =>'CategoryController@sub_category', 'as'=>'sub_category' ]);

Route::get('/ajax_position_check/{id}/{perent_id}', 'CategoryController@ajax_position_check'); 

Route::get('/edit-category/{id}',['uses' =>'CategoryController@editcat','as'=>'editcat']);
Route::post('/edit-category',['uses' =>'CategoryController@update','as'=>'updateCat']);
Route::get('/delete-category/{id}',['uses' =>'CategoryController@destroy','as'=>'deleteCat']);
Route::get('/pb-category/{id}',['uses' =>'CategoryController@publish','as'=>'pbCat']);
Route::get('/upb-category/{id}',['uses' =>'CategoryController@unpublish','as'=>'upbCat']);

/* News Controller Start*/
Route::get('/news',['uses' => 'NewsController@index', 'as'=>'news']);
Route::get('/add-news',['uses'=>'NewsController@addnews','as'=>'addnews']);
Route::post('/add-news',['uses' =>'NewsController@store', 'as'=>'savenews']);
Route::get('/edit-news/{id}',['uses' =>'NewsController@editnews', 'as'=>'editnews']);
Route::post('/edit-news',['uses' =>'NewsController@update', 'as'=>'updatenews' ]);
Route::get('/delete-news/{id}',['uses' =>'NewsController@destroy','as'=>'deleteNews']);
Route::get('/pb-news/{id}',['uses' =>'NewsController@publish','as'=>'pbNews']);
Route::get('/upb-news/{id}',['uses' =>'NewsController@unpublish','as'=>'upbNews']);


/* Start Image Gallery Controller */
Route::get('/image-gallery',['uses'=>'GalleryController@index','as'=>'gallery']);
Route::get('/add-gallery',['uses'=>'GalleryController@addgallery','as'=>'addgallery']);
Route::post('/add-gallery',['uses'=>'GalleryController@store','as'=>'storeGallery']);
Route::get('/edit-gallery',['uses'=>'GalleryController@editgallery', 'as'=>'editgallery']);
Route::get('/del-img/{id}',['uses'=>'GalleryController@destroy', 'as'=>'delGallery']);
Route::get('/media-gallery',['uses'=>'GalleryController@mediaGallery','as'=>'mediaGallery']);

/* Start Video Controller */
Route::get('/videos',['uses' =>'VideoController@index','as'=>'videos']);
Route::get('/add-videos',['uses'=>'VideoController@addvideos','as'=>'addvideos']);
Route::post('/add-videos',['uses'=>'VideoController@store','as'=>'store']);
Route::get('/edit-videos/{id}',['uses' =>'VideoController@edit','as'=>'editvideos']);
Route::post('/edit-videos',['uses' =>'VideoController@update','as'=>'updatevideos']);
Route::get('/delete-videos/{id}',['uses'=>'VideoController@destroy','as'=>'deletevideos']);
Route::get('/pb-videos/{id}',['uses'=>'VideoController@publish','as'=>'pbvideos']);
Route::get('/upb-videos/{id}',['uses'=>'VideoController@unpublish','as'=>'upbvideos']);

/* Staffs Controller Start*/
Route::get('/staffs',['uses' =>'StaffController@index','as'=>'staffs']);
Route::get('/add-staffs',['uses' =>'StaffController@addstaffs','as'=>'addstaffs']);
Route::post('/add-staffs',['uses' =>'StaffController@store','as'=>'savestaffs']);
Route::get('/edit-staffs/{id}',['uses' =>'StaffController@edit','as'=>'editstaffs']);
Route::post('/edit-staffs',['uses' =>'StaffController@update','as'=>'updatestaffs']);
Route::post('/edit-staffs-role',['uses' =>'StaffController@updateRole','as'=>'updateRole']);
Route::post('/edit-staffs-pass',['uses' =>'StaffController@updatePass','as'=>'updatePass']);
Route::get('/delete-staff/{id}',['uses'=>'StaffController@destroy','as'=>'deletestaff']);
Route::get('/pb-staff/{id}',['uses'=>'StaffController@publish','as'=>'pbstaff']);
Route::get('/upb-staff/{id}',['uses'=>'StaffController@unpublish','as'=>'upbstaff']);


Route::get('/advertise',['uses' =>'AdvertiseController@index','as'=>'advertise']);
Route::get('/add-advertise',['uses' =>'AdvertiseController@addAdvertise', 'as'=>'addAdvertise']);
Route::post('/add-advertise',['uses'=>'AdvertiseController@store','as'=>'saveAdd']);

Route::get('/edit-advertise/{id}',['uses' =>'AdvertiseController@edit','as'=>'editAdvertise']);
Route::post('/edit-advertise',['uses' =>'AdvertiseController@update','as'=>'updateAdvert']);
Route::get('/del-advertise/{id}',['uses' =>'AdvertiseController@destroy','as'=>'deleteAdvert']);

/* Subscribers Controller Start*/
Route::get('/subscribers',['uses' =>'SubscriberController@index','as'=>'subscribers']);
Route::post('/subscribers',['uses' =>'SubscriberController@store','as'=>'subscribe']);
Route::get('/subscribers-sheet',['uses' =>'SubscriberController@csv','as'=>'subscribeCsv']);
Route::get('downloadExcel/{type}','SubscriberController@downloadExcel');
// Route::post('importExcel','SubscriberController@importExcel');

/* General Setting Controller Start*/
Route::get('/general-settings',['uses' =>'GeneralSettingController@index', 'as'=>'gsettings']);
Route::post('/footer',['uses' =>'GeneralSettingController@footer', 'as'=>'footer']);
Route::post('/office-address',['uses' =>'GeneralSettingController@address', 'as'=>'address']);
Route::post('/about',['uses' =>'GeneralSettingController@about', 'as'=>'about']);
Route::post('/web-content',['uses' =>'GeneralSettingController@content', 'as'=>'content']);
Route::post('/logo-update',['uses' =>'GeneralSettingController@logo', 'as'=>'logo']);
Route::post('/default-img',['uses' =>'GeneralSettingController@defaultImg', 'as'=>'defaultImg']);
Route::post('/sitemap',['uses'=>'GeneralSettingController@usiteMap','as'=>'sitemap']);
Route::post('/privacy',['uses'=>'GeneralSettingController@uprivacy','as'=>'privacy']);

Route::get('/theme-choose',['uses' =>'DashboardController@themeChoose', 'as'=>'themeChoose']);
Route::post('/theme-choose',['uses' =>'DashboardController@themeActive', 'as'=>'themeActive']);

/* Seo Controller Start*/
Route::get('/seo-settings',['uses' =>'SeoController@index', 'as'=>'seo']);
Route::post('/seo-analytics',['uses' =>'SeoController@store', 'as'=>'analytics']);
Route::post('/seo-meta',['uses' =>'SeoController@update', 'as'=>'meta']);
Route::post('/seo-fbcomment',['uses' =>'SeoController@fbcomment', 'as'=>'fbcomment']);
/* Social Controller Start*/
Route::get('/social-settings',['uses' =>'SocialController@social', 'as'=>'social']);
// Route::post('/social-update',['uses' =>'SocialController@store', 'as'=>'socialUpdate']);
Route::post('/social-settings','SocialController@addItem');
Route::get('/social-settings/{product_id?}', 'SocialController@editItem');
Route::put('/social-settings/{product_id?}', 'SocialController@updateItem');
Route::delete('/social-settings/{product_id?}','SocialController@deleteItem');

/* Login & Registration   */
Route::get('/register','UserRegisterController@index');
Route::post('/register',['uses'=>'UserRegisterController@store', 'as'=>'register']);

Route::get('/login',['uses' =>'UserLoginController@index','as'=> 'login']);
Route::post('/login',['uses' =>'UserLoginController@login','as'=> 'login']);
Route::get('/logout',['uses' =>'UserLoginController@logout','as'=> 'logout']);

Route::get('resetpassword', array('as' => 'reset.password', 'uses' => 'PasswordController@edit'));
Route::post('resetpasswordcomplete', array('as' => 'reset.password.complete', 'uses' => 'PasswordController@update'));

Route::get('/editProfile',['uses'=>'ProfileController@editProfile','as'=>'editProfile']);
Route::post('/editProfile',['uses'=>'ProfileController@updatePass','as'=>'updatePass']);
Route::post('/updateProfile',['uses'=>'ProfileController@updateProfile','as'=>'updateProfile']);
Route::post('/update-Profile',['uses'=>'ProfileController@Profile','as'=>'profile']);


Route::get('/forgot-password','ForgetPasswordController@resetFrom');
Route::post('/forget-password','ForgetPasswordController@PostForgetPassword');

/*============== Admin Password Reset Route list ===========================*/

Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');

 
Route::resource('slider', 'SliderController', ['names' => 'slider']);
Route::resource('popup-infos', 'PopupInfosController', ['names' => 'popup_infos']);
Route::resource('gallery', 'GalleryImageController', ['names' => 'gallery']);
Route::post('gallery/upload', 'GalleryImageController@upload')->name('multifileupload');