<?php

use App\Models\News;
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
    $newss = News::all();
    return view('index', compact('newss'));
});
Route::get('/register', function() { return redirect ('/'); })->name('register');

Route::post('logout',[App\Http\Controllers\Auth\LoginController::class,'logout']);

// Auth::routes(['verify' => true]);
// Auth::routes(['verify' => true, 'register' => false]);
Auth::routes(['register' => false]);
// Route::('/register')
Route::post('/portal/update/password', [App\Http\Controllers\Portal\ProfileController::class, 'changePassword'])->name('change.password');


Route::get('/whatsapp', [App\Http\Controllers\Portal\Admin\UserController::class, 'whatsapp']);




// ADMIN PORTAL
Route::get('/admin/home', [App\Http\Controllers\Portal\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/admin/register', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'index'])->name('admin.register');
Route::get('/admin/register/list', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'get_participants_list'])->name('paricipant.list');
Route::get('/admin/participant/profile/{id}/id', [App\Http\Controllers\Portal\Admin\ProfileController::class, 'index'])->name('participant.profile.admin');

Route::post('/admin/load/participant/application', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'loadApplication'])->name('load.application.admin');
Route::post('/admin/load/participant/payment', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'loadPayment'])->name('load.payment.admin');

Route::post('/admin/register/approve/application', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'approve_application'])->name('approve.application');
Route::post('/admin/register/decline/application', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'decline_application'])->name('decline.application');

Route::post('/admin/register/approve/payment', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'approve_payment'])->name('approve.payment');
Route::post('/admin/register/decline/payment', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'decline_payment'])->name('decline.payment');

Route::post('/admin/register/general/email', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'send_email'])->name('moot.general.email');
Route::post('/admin/users/general/email', [App\Http\Controllers\Portal\Admin\UserController::class, 'send_email'])->name('moot.general.email.users');

Route::get('/admin/register/export/list/excel', [App\Http\Controllers\Portal\Admin\RegisterController::class, 'excel'])->name('paricipant.list.export.excel');
Route::get('/admin/users/export/list/excel', [App\Http\Controllers\Portal\Admin\UserController::class, 'excel'])->name('user.list.export.excel');

Route::get('/admin/users', [App\Http\Controllers\Portal\Admin\UserController::class, 'index'])->name('admin.users');
Route::get('/admin/users/list', [App\Http\Controllers\Portal\Admin\UserController::class, 'get_users_list'])->name('user.list');
Route::post('/admin/users/deactivate/user', [App\Http\Controllers\Portal\Admin\UserController::class, 'deactivate_user'])->name('user.deactivate');
Route::post('/admin/users/activate/user', [App\Http\Controllers\Portal\Admin\UserController::class, 'activate_user'])->name('user.activate');
Route::post('/admin/users/create/user', [App\Http\Controllers\Portal\Admin\UserController::class, 'create_user'])->name('user.create');
Route::post('/admin/users/edit/user/getdetails', [App\Http\Controllers\Portal\Admin\UserController::class, 'edit_user_getdetails'])->name('user.edit.get.details');
Route::post('/admin/users/update/user', [App\Http\Controllers\Portal\Admin\UserController::class, 'update_user'])->name('user.update');

Route::get('/admin/news', [App\Http\Controllers\Portal\Admin\NewsController::class, 'index'])->name('admin.news');
Route::post('/admin/users/create/news', [App\Http\Controllers\Portal\Admin\NewsController::class, 'create_news'])->name('news.create');
Route::post('/admin/users/delete/news', [App\Http\Controllers\Portal\Admin\NewsController::class, 'delete_news'])->name('news.delete');

// /ADMIN PORTAL

// SCOUT PORTAL
Route::get('home', [App\Http\Controllers\Portal\Scout\HomeController::class, 'index'])->name('home');
Route::get('profile', [App\Http\Controllers\Portal\Scout\ProfileController::class, 'index'])->name('profile');
Route::get('/moot/register', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'index'])->name('moot.register');
Route::post('/moot/register', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'save_info'])->name('moot.register.save');
Route::post('/moot/register/submit', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'submit_application'])->name('moot.register.submit');

Route::post('/moot/register/profileImage', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'uploadProfileImage'])->name('moot.application.profile.Image');
Route::post('/moot/register/delete/profileImage', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'deleteProfileImage'])->name('moot.application.delete.profile.image');
Route::post('/moot/register/payment', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'saveRegPayment'])->name('moot.application.payment');
Route::post('/moot/register/delete/paymentProof', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'deletePaymentProof'])->name('moot.application.delete.payment.proof');
Route::post('/moot/register/scanned', [App\Http\Controllers\Portal\Scout\RegisterController::class, 'saveScannedApplication'])->name('moot.application.scanned');


Route::get('/moot/register/print/application', [App\Http\Controllers\Portal\Scout\PrintController::class, 'index'])->name('moot.application.print');
// SCOUT PORTAL