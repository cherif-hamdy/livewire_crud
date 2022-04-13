<?php

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

Route::get('/posts', \App\Http\Livewire\Post::class)->middleware('auth')->name('home');

Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', \App\Http\Livewire\Register::class)->name('register');

    Route::get('/login' ,\App\Http\Livewire\Login::class)->name('login');
});

