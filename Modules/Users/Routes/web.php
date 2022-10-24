<?php

// Route::prefix('users')->group(function() {
    Route::group(['middleware' => ['permission:users list']], function () {
        Route::resource('/users', UsersController::class);
    });



    Route::group(['middleware' => ['permission:edit articles asdasd']], function () {
        Route::get('/my-profile', 'UsersProfileController');
    });


    Route::resource('/roles', RolesController::class);

    // ('/roles', 'RolesController@index')->name('roles.index');

    // Route::resource('/permissions', 'PermissionsController');