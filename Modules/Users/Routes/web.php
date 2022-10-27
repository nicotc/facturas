<?php

use Maatwebsite\Excel\Row;




    Route::group(['middleware' => ['permission:users_list']], function () {
        Route::resource('/users', UsersController::class);
    });



    //  Route::get('/my-profile', 'UsersProfileController');


    Route::group(['middleware' => ['permission:roles_list']], function () {
        Route::resource('/roles', RolesController::class);
    });


    // ('/roles', 'RolesController@index')->name('roles.index');

    // Route::resource('/permissions', 'PermissionsController');