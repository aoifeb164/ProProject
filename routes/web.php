<?php
# @Date:   2020-11-03T10:21:46+00:00
# @Last modified time: 2021-05-13T17:55:54+01:00

//use App\User;
use Illuminate\Support\Facades\Request;
use App\Models\User;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\MatchesController as UserMatchesController;
use App\Http\Controllers\User\ConversationController as UserConversationController;
use App\Http\Controllers\User\MessageController as UserMessageController;

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

Route::get('/admin/profiles', [AdminProfileController::class, 'index'])->name('admin.profiles.index');
Route::get('/admin/profiles/{id}', [AdminProfileController::class, 'show'])->name('admin.profiles.show');
// Route::get('/admin/profiles/{id}/edit', [AdminProfileController::class, 'edit'])->name('admin.profiles.edit');
// Route::put('/admin/profiles{id}', [AdminProfileController::class, 'update'])->name('admin.profiles.update');
Route::delete('/admin/profiles/{id}', [AdminProfileController::class, 'destroy'])->name('admin.profiles.destroy');

<<<<<<< HEAD
//Route::get('/admin/viewprofile', [AdminProfileController::class, 'index'])->name('admin.profiles.viewprofile');

Route::post('/search',[AdminProfileController::class,'search'])->name('search');
// Route::get('/', [PageController::class, 'defaultProfile'])->name('defaultProfile');

//
// Route::post('/search',function(){
//
// });
=======
Route::get('/user/profiles', [UserProfileController::class, 'show'])->name('user.profiles.show');
Route::get('/user/profiles/{id}', [UserProfileController::class, 'display'])->name('user.profiles.home.show');
Route::put('/user/profiles', [UserProfileController::class, 'update'])->name('user.profiles.update');
Route::get('/user/profiles edit', [UserProfileController::class, 'edit'])->name('user.profiles.edit');
Route::post('/user/profiles/store', [UserProfileController::class, 'store'])->name('user.profiles.store');
Route::delete('/user/profiles', [UserProfileController::class, 'destroy'])->name('user.profiles.destroy');

Route::get('/user/matches', [UserMatchesController::class, 'index'])->name('user.matches.index');
Route::post('/user/matches/accept', [UserMatchesController::class, 'accept'])->name('user.matches.accept');
Route::post('/user/matches/reject', [UserMatchesController::class, 'reject'])->name('user.matches.reject');
Route::post('/user/matches/store', [UserMatchesController::class, 'store'])->name('user.matches.store');
Route::delete('/user/matches/{id}', [UserMatchesController::class, 'destroy'])->name('user.matches.destroy');

Route::delete('/user/conversations/{id}', [UserConversationController::class, 'destroy'])->name('user.conversations.destroy');
Route::get('/user/conversations/create', [UserConversationController::class, 'create'])->name('user.conversations.create');
Route::get('/user/conversations', [UserConversationController::class, 'index'])->name('user.conversations.index');
Route::post('/user/messages/store', [UserConversationController::class, 'store'])->name('user.messages.store');

Route::get('/user/messages/{id}', [UserMessageController::class, 'index'])->name('user.messages.index');
// Route::get('/user/messages/{id}', [UserConversationController::class, 'index'])->name('user.messages.show');
>>>>>>> aoife
