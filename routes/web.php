<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InviteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlusOneController;

use App\Models\PlusOne;

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

Route::get('/logout', function(){Auth::guard()->logout(); return redirect('/');})->name('logout');
Route::get('/auth/login', function(){return view('auth.requestLink');})->name('login');
Route::post('/auth/login', [UserController::class, 'sendMagicLink']);
Route::get('/auth/token/{token}', [UserController::class, 'login']);

Route::get('/', function() {return view('dashboard');})->middleware(['auth'])->name('dashboard');
Route::get('/invite', function() {return view('booking.code');});
Route::get('/invite/{token}', [InviteController::class, 'checkAndRedirect']);
Route::post('/auth/register', [UserController::class, 'register']);

Route::get('/plusone', function() {return view('plusone/request');})->middleware(['auth']);
Route::post('/plusone', [PlusOneController::class, 'request'])->middleware(['auth']);

Route::put('/user/{id}', [UserController::class, 'update'])->middleware(['auth']);

Route::get('/admin/invites', function() {return view('admin.invite.list')->with('invites', InviteController::index());})->middleware(['auth', 'admin']);
Route::get('/admin/invite', function() {return view('admin.invite.new');})->middleware(['auth', 'admin']);
Route::post('/admin/invite', [InviteController::class, 'generate'])->middleware(['auth', 'admin']);
Route::get('/admin/plusone/{plusOne}/accept', [PlusOneController::class, 'accept'])->middleware(['auth', 'admin']);
Route::get('/admin/plusone/{plusOne}/reject', [PlusOneController::class, 'reject'])->middleware(['auth', 'admin']);
Route::get('/admin/bookings', function() {return view('admin.booking.list')->with('users', UserController::index());})->middleware(['auth', 'admin']);