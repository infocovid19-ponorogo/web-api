<?php

// use Dingo\Api\Routing\Router;

// /** @var Router $api */
// $api = app(Router::class);

// $api->version('v1', function (Router $api) {
//     $api->group(['prefix' => 'auth'], function(Router $api) {
//         $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
//         $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

//         $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
//         $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

//         $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
//         $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
//         $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
//     });

//     $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
//         $api->get('protected', function() {
//             return response()->json([
//                 'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
//             ]);
//         });

//         $api->get('refresh', [
//             'middleware' => 'jwt.refresh',
//             function() {
//                 return response()->json([
//                     'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
//                 ]);
//             }
//         ]);
//     });

//     $api->get('hello', function() {
//         return response()->json([
//             'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
//         ]);
//     });
// });

use App\Http\Controllers\Backend\Auth\Role\RoleController;
use App\Http\Controllers\Backend\Auth\User\UserController;
use App\Http\Controllers\Backend\KecamatanController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Frontend\Auth\ApiLoginController;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [ApiLoginController::class, 'login']);
    Route::post('signup', [ApiLoginController::class, 'signup']);
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [ApiLoginController::class, 'logout']);
        Route::post('refresh', [ApiLoginController::class, 'refresh']);
        Route::get('users', [UserController::class, 'indexJson']);
        Route::get('user/{id}', [UserController::class, 'showJson']);
        Route::get('roles', [RoleController::class, 'indexJson']);
    });
});

Route::group([
    'prefix' => 'kecamatan',
    'middleware' => 'api'
], function () {

    Route::get('/', [KecamatanController::class, 'indexJson']);
    Route::get('/{kecamatan}', [KecamatanController::class, 'showJson']);
});

Route::group([
    'prefix' => 'berita',
    'middleware' => 'api'
], function () {

    Route::get('/', [NewsController::class, 'indexJson']);
    Route::get('/{news}', [NewsController::class, 'showJson']);
});