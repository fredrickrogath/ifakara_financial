<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'accountant', 'as' => 'accountant.'], function () {
    Route::post('/getLegerEntries', [\App\Http\Controllers\Accountant\DashboardController::class, 'getLegerEntries'])->name('getLegerEntries');
    Route::get('/getLegerEntries1', [\App\Http\Controllers\Accountant\DashboardController::class, 'getLegerEntries1'])->name('getLegerEntries1');

    Route::post('/invoiceFromSchool', [\App\Http\Controllers\Accountant\Invoice\InvoiceController::class, 'invoiceFromSchool'])->name('invoiceFromSchool');

});

Route::post('/registerSchool', [\App\Http\Controllers\School\SchoolRegistationController::class, 'registerSchool'])->name('registerSchool');