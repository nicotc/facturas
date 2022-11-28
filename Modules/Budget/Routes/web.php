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
Route::get('budget/print/{id}', [BudgetController::class, 'print'])->name('budget.print');
Route::get('budget/abono/{id}', [BudgetController::class, 'abono'])->name('budget.abono');
Route::get('budget/gastos/{id}', [BudgetController::class, 'gastos'])->name('budget.gastos');
Route::get('budget/portada/{id}', [BudgetController::class, 'portada'])->name('budget.portada');
Route::get('budget/factura/', [BudgetController::class, 'factura'])->name('budget.factura');