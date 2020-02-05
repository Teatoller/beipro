<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('user', 'Auth\UserController');

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('register/activate/{token}', 'AuthController@registerActivate');

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::post('profile', 'AuthController@profile');
});

Route::group([
    'middleware' => 'api',
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::apiResources([
    'currentprices' => 'CurrentPriceController',
    'frontoffices' => 'FrontOfficeController',
    'companies' => 'CompanyController',
    'companyadmins' => 'CompanyAdminController',
    'admins' => 'AdminController',
]);

Route::get('depotprices', 'DepotPriceController@index');
Route::get('frontadmins', 'AdminFrontofficeCombineController@index');
Route::get('combineadmins', 'CombineCompanyAdminController@index');
