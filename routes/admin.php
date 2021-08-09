<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Config::set('auth.defaults.guard','web');

    Route::get('login','LoginController@index')->name('login.index');
    Route::post('login','LoginController@login')->name('login.store');
    Route::post('logout','LoginController@logout')->name('logout');

     Route::group(['middleware'=>'admin'],function(){
            Route::get('/','DashboardController@index')->name('dashboards.index');

            Route::resource('roles', 'RoleController');
            Route::resource('permissions', 'PermissionController');
            Route::resource('settings', 'SettingsController');
            // account
            Route::get('profile', 'AccountController@index')->name('account');
            Route::post('/general-info', "AccountController@store")->name('generalInfo');
            Route::post('/change-password', "AccountController@store")->name('changePassword');
            Route::post('/change-image', "AccountController@store")->name('changeImage');
            // account
     });