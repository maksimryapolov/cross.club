<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'FrontController@index');

Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'password.confirm']], function() {
    
    Route::resource('/cabinet/feedback', 'FeedbackControllers', [
        'names' => [
            'index' => 'admin.feedback',
            'show' => 'admin.feedback.show'
        ]
    ]);

    Route::resource('/cabinet', 'AdminController',
        [
            'names' => [
                'index' => 'admin',
                'create' => 'admin.cabinet.create',
                'update' => 'admin.cabinet.update',
                'edit' => 'admin.cabinet.edit',
                'store' => 'admin.cabinet.store',
                'show' => 'admin.cabinet.show',
                'destroy' => 'admin.cabinet.destroy',
            ]
        ]
    );

    Route::resource('/cabinet/offers', 'OffersControllers',
        [
            'names' => [
                // 'index' => 'admin.offers',
                'create' => 'admin.offers.create',
                'update' => 'admin.offers.update',
                'edit' => 'admin.offers.edit',
                'store' => 'admin.offers.store',
                'show' => 'admin.offers.show',
                'destroy' => 'admin.offers.destroy',
            ]
        ]
    );
});

Route::post('/feedback', 'FeedbackController@store');


Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware(['auth', 'password.confirm']);
