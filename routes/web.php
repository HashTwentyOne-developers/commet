<?php

use GuzzleHttp\Middleware;
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

Route::get('/blog',[App\Http\Controllers\frontendViewController::class,'blogView']);
Route::post('/blog',[App\Http\Controllers\frontendViewController::class,'blogSearch']) ->name('post.search');
Route::get('blog/category/{slug}',[App\Http\Controllers\frontendViewController::class,'blogCatSearch']) ->name('post.cat.search');
Route::get('blog/{title}',[App\Http\Controllers\frontendViewController::class,'blogSingleView']) ->name('post.blog.single');

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
Route::get('post-trash','App\Http\Controllers\postController@postShowTrash')->name('post.trash');
Route::get('post-trash-update/{id}','App\Http\Controllers\postController@trashPerform')->name('post.trashperform');


// post controller
Route::resource('postcat','App\Http\Controllers\postCategoryController');
Route::get('postcat/statusInactive/{id}','App\Http\Controllers\postCategoryController@statusCheckedInactive');
Route::get('postcat/statusActive/{id}','App\Http\Controllers\postCategoryController@statusCheckedActive');

//post Tag
Route::resource('post-tag','App\Http\Controllers\postTagController');
Route::get('post-tag/statusInactive/{id}','App\Http\Controllers\postTagController@statusCheckedInactive');
Route::get('post-tag/statusActive/{id}','App\Http\Controllers\postTagController@statusCheckedActive');

//product Category
Route::middleware(['auth'])->group(function () {
    Route::resource('productCategory','App\Http\Controllers\productCatManagement');
});

