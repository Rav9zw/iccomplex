<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportCsvController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\CalculatedListController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/import_csv', [ImportCsvController::class, 'index'])->name('importCsv');
Route::post('/import_csv_file', [ImportCsvController::class, 'import'])->name('importCsvFile');

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order', [OrderController::class, 'calculate'])->name('orderCalculate');

Route::get('/price_list', [PriceListController::class, 'index'])->name('priceList');
Route::get('/calculated_list', [CalculatedListController::class, 'index'])->name('calculatedList');
