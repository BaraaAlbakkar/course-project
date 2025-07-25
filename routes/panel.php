<?php

use App\Http\Controllers\Panel\AdminController;
use App\Http\Controllers\Panel\BlogController;
use App\Http\Controllers\Panel\CourseController;
use App\Http\Controllers\Panel\FaqController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\LectureController;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'as' => 'panel.'
    ], function () {

    Route::group(['prefix' => 'panel'], function () {

        Route::get('login', 'Auth\LoginController@showLoginForm')->name('showLogin');
        Route::post('login', 'Auth\LoginController@login')->name('login');

        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('/', [HomeController::class, 'index'])->name('index');


            Route::group(['prefix' => 'admins' , 'as' => 'admins.'], function () {

                Route::get('/', [AdminController::class, 'index'])->name('index');
                Route::get('/datatable', [AdminController::class, 'datatable'])->name('datatable');


                Route::group(['prefix' => 'create'], function (){
                   Route::get('/',[AdminController::class , 'create'])->name('create');
                   Route::post('/',[AdminController::class , 'store'])->name('store');
                });

                Route::group(['prefix' => '{id}'], function (){
                   Route::get('/edit',[AdminController::class , 'edit'])->name('edit');
                   Route::put('/edit',[AdminController::class , 'update'])->name('update');
                   Route::delete('/',[AdminController::class , 'destroy'])->name('destroy');
                   Route::post('/operation',[AdminController::class , 'operation'])->name('operation');
                });

            });
            Route::group(['prefix' => 'blogs' , 'as' => 'blogs.'], function () {

                Route::get('/', [BlogController::class, 'index'])->name('index');
                Route::get('/datatable', [BlogController::class, 'datatable'])->name('datatable');


                Route::group(['prefix' => 'create'], function (){
                   Route::get('/',[BlogController::class , 'create'])->name('create');
                   Route::post('/',[BlogController::class , 'store'])->name('store');
                });

                Route::group(['prefix' => '{id}'], function (){
                   Route::get('/edit',[BlogController::class , 'edit'])->name('edit');
                   Route::put('/edit',[BlogController::class , 'update'])->name('update');
                   Route::delete('/',[BlogController::class , 'destroy'])->name('destroy');
                   Route::post('/operation',[BlogController::class , 'operation'])->name('operation');
                });

            });
            Route::group(['prefix' => 'faqs' , 'as' => 'faqs.'], function () {

                Route::get('/', [FaqController::class, 'index'])->name('index');
                Route::get('/datatable', [FaqController::class, 'datatable'])->name('datatable');


                Route::group(['prefix' => 'create'], function (){
                    Route::get('/',[FaqController::class , 'create'])->name('create');
                    Route::post('/',[FaqController::class , 'store'])->name('store');
                });

                Route::group(['prefix' => '{id}'], function (){
                    Route::get('/edit',[FaqController::class , 'edit'])->name('edit');
                    Route::put('/edit',[FaqController::class , 'update'])->name('update');
                    Route::delete('/',[FaqController::class , 'destroy'])->name('destroy');
                    Route::post('/operation',[FaqController::class , 'operation'])->name('operation');
                });

            });

            Route::group(['prefix' => 'courses' , 'as' => 'courses.'], function () {

                Route::get('/', [CourseController::class, 'index'])->name('index');
                Route::get('/datatable', [CourseController::class, 'datatable'])->name('datatable');


                Route::group(['prefix' => 'create'], function (){
                    Route::get('/',[CourseController::class , 'create'])->name('create');
                    Route::post('/',[CourseController::class , 'store'])->name('store');
                });

                Route::group(['prefix' => '{id}'], function (){
                    Route::get('/edit',[CourseController::class , 'edit'])->name('edit');
                    Route::put('/edit',[CourseController::class , 'update'])->name('update');
                    Route::delete('/',[CourseController::class , 'destroy'])->name('destroy');
                    Route::post('/operation',[CourseController::class , 'operation'])->name('operation');
                });

            });

            Route::group(['prefix' => 'lectures' , 'as' => 'lectures.'], function () {


                Route::get('/{course_id}', [LectureController::class, 'index'])->name('index');
                Route::get('/datatable/{id}', [LectureController::class, 'datatable'])->name('datatable');
                Route::post('/{id}',[LectureController::class , 'store'])->name('store');

                Route::group(['prefix' => 'create'], function (){
                    Route::get('/{id}',[LectureController::class , 'create'])->name('create');
                });

                Route::group(['prefix' => '{id}'], function (){
                    Route::get('/edit',[LectureController::class , 'edit'])->name('edit');
                    Route::put('/edit',[LectureController::class , 'update'])->name('update');
                    Route::delete('/',[LectureController::class , 'destroy'])->name('destroy');
                    Route::post('/operation',[LectureController::class , 'operation'])->name('operation');
                });

            });



        });
    });


});

