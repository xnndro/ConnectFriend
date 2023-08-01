<?php

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

Route::get('/', [App\Http\Controllers\LandingController::class, 'landing'])->name('landing');
Route::post('/session', [App\Http\Controllers\LandingController::class, 'session'])->name('session');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/wishlist', [App\Http\Controllers\WishlistController::class, 'store'])->name('wishlist');
Route::get('/listfriend',[App\Http\Controllers\WishlistController::class, 'list'])->name('listfriend');
Route::delete('/listfriend/{id}',[App\Http\Controllers\WishlistController::class, 'destroy'])->name('listfriend.destroy');


Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat');
Route::post('/broadcast' , [App\Http\Controllers\ChatController::class, 'broadcast'])->name('broadcast');
Route::post('/receive' , [App\Http\Controllers\ChatController::class, 'receive'])->name('receive');