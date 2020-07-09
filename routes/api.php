<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'password',
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::get('register/activate/{token}', 'AuthController@registerActivate');

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('profile', 'AuthController@profile');
        Route::post('profile', 'AuthController@update_avatar');
        Route::patch('profile', 'AuthController@update_name');
        Route::apiResources([
            'currentprices' => 'CurrentPriceController',
            'frontoffices' => 'FrontOfficeController',
            'companies' => 'CompanyController',
            'companyadmins' => 'CompanyAdminController',
            'admins' => 'AdminController',
            'superadmins' => 'SuperAdminController',
        ]);
        Route::get('depotprices', 'DepotPriceController@index');
        Route::get('frontadmins', 'AdminFrontofficeCombineController@index');
        Route::get('combineadmins', 'CombineCompanyAdminController@index');
        Route::get('audits', 'AuditController@index');
        Route::get('audits/{token}', 'AuditController@show');

        Route::get('contact-us', 'ContactUsController@index');
        Route::post('contact-us', 'ContactUsController@store');
        Route::get('contact-us/{id}', 'ContactUsController@show');
        Route::delete('contact-us/{id}', 'ContactUsController@destroy');
    });
});
