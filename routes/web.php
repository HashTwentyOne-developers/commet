<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin view
Route::get('/admin/login',[App\Http\Controllers\AdminController::class,'AdminloginForm'])->name('admin.login');
Route::get('/admin/register',[App\Http\Controllers\AdminController::class,'AdminRegistrationForm'])->name('admin.register');
Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class,'AdminDashboard'])->name('admin.dashboard');

//admin login setup

Route::post('admin/login', [App\Http\Controllers\Auth\LoginController::class,'login'])->name('admin.login');
Route::post('admin/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('admin.logout');
Route::post('admin/register',[App\Http\Controllers\Auth\RegisterController::class,'register'])->name('admin.register');

// Post Route
Route::resource('post','App\Http\Controllers\postController');
Route::resource('postcat','App\Http\Controllers\postCategoryController');
Route::get('postcat/statusInactive/{id}','App\Http\Controllers\postCategoryController@statusCheckedInactive');
Route::get('postcat/statusActive/{id}','App\Http\Controllers\postCategoryController@statusCheckedActive');
