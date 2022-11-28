<?php

use Modules\Inventory\Http\Controllers\InventoryController;

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




Route::group(['middleware' => ['permission:client_list']], function () {
    Route::get('inventory', [InventoryController::class, 'index']);
    Route::get('materiales', [InventoryController::class, 'materiales']);

});