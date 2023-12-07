<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhotoUploadController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('photo-upload-using-ajax',[PhotoUploadController::class,'index'])->name('photo_upload_using_ajax');
Route::post('photo-upload-using-ajax',[PhotoUploadController::class,'index'])->name('photo_upload_using_ajax');
Route::get('register',function() {
    return view('registration_form');
})->name('register')->middleware('guest');
Route::post('register',[AuthController::class,'register'])->name('register')->middleware('guest');
Route::get('login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::get('logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
Route::get('dashboard',[RegisteredUserController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::get('delete-user/{id}',[RegisteredUserController::class,'delete_user'])->name('user.delete')->middleware('auth');
