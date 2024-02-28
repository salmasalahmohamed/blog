<?php

use App\Http\Controllers\Admin\AutherController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Auther\BlogController;
use App\Http\Controllers\Auther\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::namespace('Auther')->middleware('guest:admin')->group(function (){
    Route::get('login',[AutherController::class,'loginForm']);
    Route::get('register',[AutherController::class,'registerForm']);
    Route::post('register',[AutherController::class,'register'])->name('register');
    Route::post('login',[AutherController::class,'login'])->name('login');
    Route::get('verify/{token}',[AutherController::class,'emailverifivation']);

    Route::get('forget',[AutherController::class,'forget'])->name('forget');

    Route::post('reset',[AutherController::class,'forgetpassword'])->name('reset');
    Route::get('send/{token}',[AutherController::class,'resetform']);

    Route::post('reset',[AutherController::class,'reset'])->name('resetpassword');


});
Route::namespace('Auther')->middleware('auth:admin')->group(function (){
 //   Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('logout',[AutherController::class,'logout']);
    ///////////////////////////////////////////////////////////////////
    Route::get('user/list',[DashboardController::class,'user']);
    Route::get('user/create',[DashboardController::class,'userForm']);
    Route::post('user/add',[DashboardController::class,'addUser'])->name('user.add');
    Route::get('user/delete/{id}',[DashboardController::class,'delete']);
    Route::get('user/edit/{id}',[DashboardController::class,'edit']);
    Route::post('user/update/{id}',[DashboardController::class,'update']);
/////////////////////////////////////////////////////////////////////////////////

    Route::get('category/list',[CategoryController::class,'index']);
    Route::get('category/create',[CategoryController::class,'form']);
    Route::post('category/add',[CategoryController::class,'create']);
    Route::get('category/delete/{id}',[CategoryController::class,'destroy']);
    Route::get('category/edit/{id}',[CategoryController::class,'edit']);
    Route::post('category/update/{id}',[CategoryController::class,'update']);
    //////////////////////////////////////////////////////////////////
    Route::get('class/create',[LessonController::class,'form']);
    Route::post('class/add',[LessonController::class,'add']);
    Route::get('class/delete/{id}',[LessonController::class,'destroy']);
    Route::get('class/edit/{id}',[LessonController::class,'edit']);
    Route::post('class/update/{id}',[LessonController::class,'update']);
    Route::get('class/list',[LessonController::class,'index']);

});
Route::middleware('guest')->prefix('user')->group(function (){
    Route::get('login',[UserController::class,'index']);
    Route::post('login',[UserController::class,'login'])->name('user.login');

});
Route::middleware('auth')->group(function (){
    Route::get('dashboard',[DashboardController::class,'index']);
Route::get('blog/form',[BlogController::class,'form']);
    Route::post('blog/add',[BlogController::class,'add']);
    Route::get('blog/show',[BlogController::class,'index']);
    Route::get('blog/edit/{id}',[BlogController::class,'edit']);
    Route::post('blog/update/{id}',[BlogController::class,'update']);
    Route::get('blog/delete/{id}',[BlogController::class,'destroy']);


});
