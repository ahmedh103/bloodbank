<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DonationRequestController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Auth::routes();
Route::group(['middleware'=>['auth','auto-check-permission']],function (){
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 
	Route::get('/home',[HomeController::class,'index'])->name('index');
	   /*  Category Routes */
	   Route::group([
		'controller' => GovernorateController::class,
		'prefix'     => 'governorate', 'as' => 'governorate.',

	], function () {
		Route::get('index', 'index')->name('index');
		 Route::get('create', 'create')->name('create');
		Route::post('store', 'store')->name('store');
		Route::get('edit/{governorate}', 'edite')->name('edit');
		Route::put('update/{governorate}', 'update')->name('update');
		 Route::delete('delete/{governorate}', 'delete')->name('delete');

	});
	Route::group([
		'controller' => CityController::class,
		'prefix'     => 'city', 'as' => 'city.',

	], function () {
		Route::get('index', 'index')->name('index');
		 Route::get('create', 'create')->name('create');
		Route::post('store', 'store')->name('store');
		Route::get('edit/{city}', 'edite')->name('edit');
		Route::put('update/{city}', 'update')->name('update');
		 Route::delete('delete/{city}', 'delete')->name('delete');
		 Route::get('restore', 'restore')->name('restore');
	});


	Route::group([
		'controller' => CategoryController::class,
		'prefix'     => 'category', 'as' => 'category.',

	], function () {
		Route::get('index', 'index')->name('index');
		Route::get('create', 'create')->name('create');
		Route::post('store', 'store')->name('store');
		Route::get('edit/{category}', 'edite')->name('edit');
		Route::put('update/{category}', 'update')->name('update');
		Route::delete('delete/{category}', 'delete')->name('delete');
		
	});


	
	Route::group([
		'controller' => DonationRequestController::class,
		'prefix'     => 'donation', 'as' => 'donation.',

	], function () {
		Route::get('index', 'index')->name('index');
		Route::delete('delete/{donation}', 'delete')->name('delete');
		
	});

	Route::group([
		'controller' => PostController::class,
		'prefix'     => 'post', 'as' => 'post.',

	], function () {
		Route::get('index', 'index')->name('index');
		 Route::get('create', 'create')->name('create');
		Route::post('store', 'store')->name('store');
		Route::get('edit/{post}', 'edite')->name('edit');
		Route::put('update/{post}', 'update')->name('update');
		 Route::delete('delete/{post}', 'delete')->name('delete');
		
	});

	
	Route::group([
		'controller' => SettingController::class,
		'prefix'     => 'setting', 'as' => 'setting.',

	], function () {
		Route::get('index', 'index')->name('index');
		
		Route::get('edit/{setting}', 'edite')->name('edit');
		Route::put('update/{setting}', 'update')->name('update');
		
		
	});


	Route::group([
		'controller' => RoleController::class,
		'prefix'     => 'role', 'as' => 'role.',

	], function () {
		Route::get('index', 'index')->name('index');
		 Route::get('create', 'create')->name('create');
		Route::post('store', 'store')->name('store');
		Route::get('edit/{role}', 'edite')->name('edit');
		Route::put('update/{role}', 'update')->name('update');
		 Route::delete('delete/{role}', 'delete')->name('delete');
		
	});

	Route::group([
		'controller' => ClientController::class,
		'prefix'     => 'client', 'as' => 'client.',

	], function () {
		 Route::get('index', 'index')->name('index');
		 Route::delete('delete/{client}', 'delete')->name('delete');
		 Route::get("approve/{client}",'approve')->name('approve');
       	 Route::get("reject/{client}",'reject')->name('reject');
		 Route::get("active-all",'makeAllStatusActive')->name('activeAll');

	});

	Route::group([
		'controller' => ContactController::class,
		'prefix'     => 'contact', 'as' => 'contact.',

	], function () {
		Route::get('index', 'index')->name('index');
		Route::delete('delete/{contact}', 'delete')->name('delete');
		
	});




	Route::group([
		'controller' => UserController::class,
		'prefix'     => 'user', 'as' => 'user.',

	], function () {
		Route::get('index', 'index')->name('index');
		 Route::get('create', 'create')->name('create');
		Route::post('store', 'store')->name('store');
		Route::get('edit/{user}', 'edite')->name('edit');
		Route::put('update/{user}', 'update')->name('update');
		 Route::delete('delete/{user}', 'delete')->name('delete');
		
	});


});


});