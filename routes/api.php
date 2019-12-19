<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('test', function () {
    return response(['message' => 'BeiPro API works well!'], 200);
});

Route::prefix('auth')->group(function () {
    Route::post('login', 'Auth\AuthController@login');
    Route::get('refresh', 'Auth\AuthController@refreshToken');

    Route::middleware('auth:api')->group(function () {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('test', function () {
            return response(['message' => 'BeiPro authentication service works well!'], 200);
        });
    });
});

Route::resource('user', 'Auth\UserController');

Route::apiResources([
    'currentprices' => 'CurrentPriceController',
    'frontoffices' => 'FrontOfficeController',
    'companies' => 'CompanyController',
    'companyadmins' => 'CompanyAdminController',
]);
