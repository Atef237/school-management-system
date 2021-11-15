<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' /* ,'auth'*/ ]
    ], function(){

        Route::get('/', function()
        {
            return View('dashboard.index');
        })->name('index');


        route::get('login','Auth\loginController@loginForm');
        route::post('login','Auth\loginController@postLogin')->name('Post.login');

        route::group(['namespace' => 'Grades'],function (){

            Route::resource('grades', 'GradeController');

        });


        route::group(['namespace' => 'school_years'],function (){

            Route::resource('school_year', 'school_yearsController');
            route::POST('delete-all','school_yearsController@deleteAll')->name('delete-all');
            route::post('filter','school_yearsController@filter')->name('filter');

        });


        route::group(['namespace' => 'classroom'],function (){
            route::resource('classroom','classroomController');
            route::get('classes/{id}','classroomController@getClasses');
    });
});


//
//Route::group(['prefix' => LaravelLocalization::setLocale()], function()
//{
//    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//    Route::get('/', function()
//    {
//        return View::make('dashboard');
//    });

//});
