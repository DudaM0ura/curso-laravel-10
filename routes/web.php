<?php

use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;

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

Route::controller(SupportController::class)->group(function () {
    Route::prefix('supports')->group(function () {
        Route::get('/', 'index')->name('support.index');
        Route::get('/create', 'create')->name('support.create');
        Route::post('/create', 'store')->name('support.store');
        Route::get('/{supportId}', 'show')->name('support.show');
        Route::get('/{supportId}/edit', 'edit')->name('support.edit');
        Route::put('/{supportId}/edit', 'update')->name('support.update');
        Route::delete('/{supportId}/delete', 'destroy')->name('support.delete');
    });
});

