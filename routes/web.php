<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\WebsiteSettingController;
use App\Http\Controllers\backend\MainController;
use App\Http\Controllers\backend\AboutUsController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\GalleriesController;

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


Route::get('/tables', function () {
    return view('DataTables');
});
Route::group(
    ['prefix' =>'admin', 'middleware' =>[ 'auth', 'prevent-back-history' ] ],

    function () {
    Route::get('/dashboard', function () {
                return view('backend.index');
    })->name('dashboard');
    Route::resource('projects', ProjectController::class);
    Route::resource('mains', MainController::class);
    Route::resource('abouts', AboutUsController::class);
    Route::resource('galleries', GalleryController::class);
    //Socail Setting
    Route::get('/social/setting', [WebsiteSettingController::class, 'SocialSetting'])->name('social.setting');
    Route::post('/social/update/{id}', [WebsiteSettingController::class, 'SocialUpdate'])->name('update.social');
    // All Website Setting Routes
    Route::get('/web/setting', [WebsiteSettingController::class, 'MainWebSetting'])->name('website.setting');
    Route::post('/update/websetting/{id}', [WebsiteSettingController::class, 'UpdateWebSetting'])->name('update.websetting');

    });
     //Contact Page Routes
    Route::get('contact/page', [ContactController::class,'Contact'])->name('contact.page');
    Route::post('contact/form', [ContactController::class,'ContactForm'])->name('contact.form');
    Route::get('admin/all/messages', [ContactController::class,'AllMessage'])->name('all.messages');

    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/about-us',[AboutController::class,'index'])->name('about-us');
    Route::get('/projects',[ProjectsController::class,'index'])->name('projects');
    Route::get('/gallery',[GalleriesController::class,'index'])->name('gallery');

//Login and Logout Routes
Route::get( '/admin', [ AuthController::class, 'showLoginForm' ] )->name( 'admin.showlogin' )->middleware( 'guest' );
;
Route::post( 'admin/login', [ AuthController::class, 'doLogin' ] )->name( 'admin.login' );

Route::get( 'admin/logout', [ AuthController::class, 'logout' ] )->name( 'admin.logout' );

