<?php

use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'as' => 'user.'
    ], function () {

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', function () {
                return view('user.index');
            });

        });
    });
