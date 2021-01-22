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

Route::post('logout',[App\Http\Controllers\Auth\LoginController::class,'logout']);

Auth::routes(['verify' => true]);

Route::get('home', [App\Http\Controllers\Portal\Scout\HomeController::class, 'index'])->name('home');
Route::get('/moot/register', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'index'])->name('moot.register');
Route::post('/moot/register', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'save_info'])->name('moot.register');
Route::post('/moot/register/submit', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'submit_application'])->name('moot.register.submit');
Route::get('/moot/register/print/application', [App\Http\Controllers\Portal\Scout\PrintController::class, 'index'])->name('moot.application.print');
