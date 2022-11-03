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

 use Modules\Budget\Http\Controllers\BudgetController;



// Route::resource('budget', BudgetController::class);
Route::get('budget', [BudgetController::class, 'index'])->name('budget.index');
Route::get('budget/showItems/{id}', [BudgetController::class, 'showItems'])->name('budget.showItems');
Route::get('budget/showBreakdown/{id}', [BudgetController::class, 'showBreakdown'])->name('budget.showBreakdown');