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
Route::post('/portal/update/password', [App\Http\Controllers\Portal\ProfileController::class, 'changePassword'])->name('change.password');


// ADMIN PORTAL
Route::get('/admin/home', [App\Http\Controllers\Portal\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/admin/register', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'index'])->name('admin.register');
Route::get('/admin/register/list', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'get_participants_list'])->name('paricipant.list');
Route::get('/admin/participant/profile/{id}/id', [App\Http\Controllers\Portal\Admin\ProfileController::class, 'index'])->name('participant.profile.admin');
Route::get('/admin/participant/application/{id}/id', [App\Http\Controllers\Portal\Admin\ProfileController::class, 'application'])->name('participant.application.admin');
Route::get('/admin/participant/payment/{id}/id', [App\Http\Controllers\Portal\Admin\ProfileController::class, 'payment'])->name('participant.payment.admin');

Route::post('/admin/register/approve/application', [App\Http\Controllers\Portal\Admin\PofileController::class, 'approve_application'])->name('approve.application');
Route::post('/admin/register/decline/application', [App\Http\Controllers\Portal\Admin\PofileController::class, 'decline_application'])->name('decline.application');

Route::post('/admin/register/approve/payment', [App\Http\Controllers\Portal\Admin\PofileController::class, 'approve_payment'])->name('approve.payment');
Route::post('/admin/register/decline/payment', [App\Http\Controllers\Portal\Admin\PofileController::class, 'decline_payment'])->name('decline.payment');

// /ADMIN PORTAL

// SCOUT PORTAL
Route::get('home', [App\Http\Controllers\Portal\Scout\HomeController::class, 'index'])->name('home');
Route::get('profile', [App\Http\Controllers\Portal\Scout\ProfileController::class, 'index'])->name('profile');
Route::get('/moot/register', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'index'])->name('moot.register');
Route::post('/moot/register', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'save_info'])->name('moot.register');
Route::post('/moot/register/submit', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'submit_application'])->name('moot.register.submit');

Route::post('/moot/register/profileImage', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'uploadProfileImage'])->name('moot.application.profile.Image');
Route::post('/moot/register/delete/profileImage', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'deleteProfileImage'])->name('moot.application.delete.profile.image');
Route::post('/moot/register/payment', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'saveRegPayment'])->name('moot.application.payment');
Route::post('/moot/register/delete/paymentProof', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'deletePaymentProof'])->name('moot.application.delete.payment.proof');
Route::post('/moot/register/scanned', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'saveScannedApplication'])->name('moot.application.scanned');


Route::get('/moot/register/print/application', [App\Http\Controllers\Portal\Scout\PrintController::class, 'index'])->name('moot.application.print');
// SCOUT PORTAL