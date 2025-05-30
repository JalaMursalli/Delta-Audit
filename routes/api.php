<?php

use App\Http\Controllers\Api\ContactApplyController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\TranslateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('language')->group(function(){
    Route::get('/',[HomeController::class,'index']);
    Route::get('/translates',[TranslateController::class,'index']);
    Route::post('/send-apply',[ContactApplyController::class,'send']);
});
