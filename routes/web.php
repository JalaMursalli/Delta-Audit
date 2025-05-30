<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\CertificateController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FooterLogoController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\MissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\WorthController;
use App\Http\Controllers\Backend\FooterSocialController;
use App\Http\Controllers\Backend\HeaderSocialController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\ContactApplyController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TranslationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('post-login',[AuthController::class,'postLogin'])->name('login-post');
    Route::post('logout', action: [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');
Route::group(['middleware'=>['auth'],'prefix'=>'admin','as'=>'backend.'],function(){
    Route::resource('hero',HeroController::class);
    Route::resource('about',AboutController::class);
    Route::resource('partner',PartnerController::class);
    Route::resource('service',ServiceController::class);
    Route::resource('mission',MissionController::class);
    Route::resource('worth',WorthController::class);
    Route::resource('contact',ContactController::class);
    Route::resource('footer-logo',FooterLogoController::class);
    Route::resource('footer-social',FooterSocialController::class);
    Route::resource('header-social',HeaderSocialController::class);
    Route::resource('seo', SeoController::class);
    Route::resource('translation',TranslationController::class);
    Route::resource('contact-apply',ContactApplyController::class);
    Route::resource('header',HeaderController::class);
    Route::resource('certificate',CertificateController::class);
});
Route::get('/admin/migrate',function(){
Artisan::call('migrate');
});
