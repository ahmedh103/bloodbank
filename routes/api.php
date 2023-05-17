<?php use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('sign-up', [ClientController::class, 'register']);

Route::post('login', [ClientController::class, 'login']);
Route::post('reset-password', [ClientController::class, 'resetPassword']);

Route::post('new-password', [ClientController::class, 'password']);

Route::group(['middleware'=>'auth:api'], function() {

        Route::get('getClientById', [ClientController::class, 'profileUser']);
        Route::get('getBloodType', [BloodTypeController::class, 'getBloodTypes']);
        Route::put('update-profile', [ClientController::class, 'updateProfileUser']);
        Route::post('post-favourite', [ClientController::class, 'postFavourite']);
        Route::get('my-favourite', [ClientController::class, 'myFavourite']);
        Route::group([ 'controller'=> NotificationController::class,
            'prefix'=> 'notifications'

            ], function () {

                Route::get('/', 'getNotification');
                Route::post('notification-setting', 'storeNotificationSetting');

                Route::get('get-notification-setting', 'getNotificationSetting');
            }

        );

        Route::group([ 'controller'=> TokenController::class,
        'prefix'=> 'tokens',
    
        ], function () {
    
            Route::post('register-token', 'registerToken');
    
        }
    
    );





        Route::group([ 'controller'=> DonationRequestController::class,
            'prefix'=> 'donation'

            ], function () {
                Route::get('/', 'getAllDonationRequests');
                Route::get('get-id/{donationrequest}', 'getDonationRequestById');
                Route::post('donation-save', 'saveDonationRequest');
            }

        );


        Route::group([ 'controller'=> PostController::class,
            'prefix'=> 'post'

            ], function () {

                Route::get('/', 'getPost');
                Route::get('get-post-by-id/{post}', 'getPostById'); 

            }

        );


        Route::post('logout', [ClientController::class, 'logout']);




    }

);



Route::group([ 'controller'=> GovernorateController::class,
    'prefix'=> 'governorates',

    ], function () {

        Route::get('/', 'getGovernorate');

    }

);


Route::group([ 'controller'=> CityController::class,
    'prefix'=> 'cities',

    ], function () {

        Route::get('/', 'getCity');

    }

);


Route::group([ 'controller'=> CategoryController::class,
    'prefix'=> 'categories',

    ], function () {

        Route::get('/', 'getCategory');

    }

);
Route::group([ 'controller'=> SettingController::class,
    'prefix'=> 'settings',

    ], function () {

        Route::get('/', 'getSetting');

    }

);


Route::group([ 'controller'=> ContactUsController::class,
    'prefix'=> 'contact',

    ], function () {

        Route::post('/contact', 'saveContacts');

    }

);
