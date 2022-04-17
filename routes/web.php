<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InviteController;
use App\Http\Controllers\UserController;

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