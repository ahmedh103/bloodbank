<?php

use App\Http\Controllers\EndUser\AuthController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ClientAuth;
use App\Models\DonationRequest;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix'=> 'enduser', 'as' => 'enduser.'], function () {


Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/register/page', [RegisterController::class, 'index'])->name('register.page');
Route::get('/login/page', [AuthController::class, 'index'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login');
});


  Route::group(['middleware'=>'ClientAuth'],function ()
  {


    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('logout/enduser', [AuthController::class, 'logout'])->name('logout.main');
    Route::post('toggle-fav', [AuthController::class, 'postFavorite'])->name('toggle.fav');
    Route::get('show/{donation}',[HomeController::class,'getDonationById'])->name('show.donation');
    Route::post('search',[HomeController::class,'search'])->name('search');
    Route::get('getalldonations',[HomeController::class,'getAllDonations'])->name('donations');

 });