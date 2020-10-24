<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/create', [App\Http\Controllers\ProfileController::class, 'create']);
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'postCreate'])->name('profile.postCreate');


Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index']);
Route::post('/blog', [App\Http\Controllers\BlogController::class, 'createBlog'])->name('blog.createBlog');


Route::get('/deleteblog/{id}', [App\Http\Controllers\BlogController::class, 'deleteBlog']);
Route::get('/updateblog/{id}', [App\Http\Controllers\BlogController::class, 'showBlog']);
Route::post('/updateblog', [App\Http\Controllers\BlogController::class, 'updateBlog'])->name('blog.updateBlog');



// Route::get('/updateblog', [App\Http\Controllers\BlogController::class, 'updateBlog']);

// Route::post('/updateblog/{id}', [App\Http\Controllers\BlogController::class, 'updateBlog'])->name('blog.updateBlog');
