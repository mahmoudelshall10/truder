<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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
Config::set('auth.defaults.guard','api');

Route::post('register', 'AuthController@register')->name('register'); 
Route::post('login', 'AuthController@authenticate')->name('login');

Route::apiResource('pages','PageController')->only(['index','show']);

Route::get('search','PageController@searchByName')->name('searchByName');

// middleware auth-api

    Route::get('auth/me', 'AuthController@me')->name('me');
    
    Route::get('auth/refresh', 'AuthController@refresh')->name('refresh');
    
    Route::get('auth/user', 'AuthController@getAuthenticatedUser')->name('authUser');
    
    Route::post('auth/update-information', 'AuthController@updateGeneralInformation')->name('updateGeneralInformation');
    
    Route::post('auth/reset-password', 'AuthController@resetPassword')->name('resetPassword');
    
    Route::post('auth/logout', 'AuthController@logout')->name('logout');

