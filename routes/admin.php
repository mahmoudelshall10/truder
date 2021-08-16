<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

Config::set('auth.defaults.guard','web');

    Route::get('login','LoginController@index')->name('login.index');
    Route::post('login','LoginController@login')->name('login.store');
    Route::post('logout','LoginController@logout')->name('logout');

     Route::group(['middleware'=>'admin'],function(){
            
            Route::get('/','DashboardController@index')->name('dashboards.index');

            Route::resource('roles', 'RoleController');
            Route::resource('permissions', 'PermissionController');
            Route::resource('settings', 'SettingsController');
            //pages
            Route::resource('pages', 'PageController');
            Route::post('pages/{id}','PageController@pageActive')->name('pages.active');
            Route::get('pages/{id}/blocks','PageController@pageBlockIndex')->name('pages.blocks.index');
            Route::get('pages/{id}/blocks/{block_id}','PageController@pageBlockShow')->name('pages.blocks.show');
            Route::get('pages/{id}/blocks/{block_id}/edit','PageController@pageBlockEdit')->name('pages.blocks.edit');
            Route::patch('pages/{id}/blocks/{block_id}','PageController@pageBlockUpdate')->name('pages.blocks.update');
            //pages

            //block
            Route::resource('blocks', 'BlockController');
            Route::post('blocks/{id}','BlockController@blockActive')->name('blocks.active');
            //block

            // account
            Route::get('profile', 'AccountController@index')->name('account');
            Route::post('/general-info', "AccountController@store")->name('generalInfo');
            Route::post('/change-password', "AccountController@store")->name('changePassword');
            Route::post('/change-image', "AccountController@store")->name('changeImage');
            // account
     });