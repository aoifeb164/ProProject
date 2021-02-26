<?php
# @Date:   2020-11-03T10:21:46+00:00
# @Last modified time: 2021-01-27T15:49:48+00:00

//use App\User;
use Illuminate\Support\Facades\Request;
use App\Models\User;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
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

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home');

// Route::get('/user/books/', [UserBookController::class, 'index'])->name('user.books.index');
// Route::get('/user/books/{id}', [UserBookController::class, 'show'])->name('user.books.show');

Route::get('/admin/profiles', [AdminProfileController::class, 'index'])->name('admin.profiles.index');
// Route::get('/admin/books/create', [AdminBookController::class, 'create'])->name('admin.books.create');
Route::get('/admin/profiles/{id}', [AdminProfileController::class, 'show'])->name('admin.profiles.show');
// Route::post('/admin/books/store', [AdminBookController::class, 'store'])->name('admin.books.store');
// Route::get('/admin/profiles/{id}/edit', [AdminProfileController::class, 'edit'])->name('admin.profiles.edit');
// Route::put('/admin/profiles{id}', [AdminProfileController::class, 'update'])->name('admin.profiles.update');
Route::delete('/admin/profiles/{id}', [AdminProfileController::class, 'destroy'])->name('admin.profiles.destroy');

//Route::get('/admin/viewprofile', [AdminProfileController::class, 'index'])->name('admin.profiles.viewprofile');

Route::post('/search',[AdminProfileController::class,'search'])->name('search');
// Route::get('/', [PageController::class, 'defaultProfile'])->name('defaultProfile');

//
// Route::post('/search',function(){
//
// });
