<?php

use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('/moot/home', [App\Http\Controllers\Portal\Scout\HomeController::class, 'index'])->name('home');
Route::get('/moot/register', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'index'])->name('register');
