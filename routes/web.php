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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# admin
Route::prefix('admin')
    ->name('admin.')
    ->group(function() {
        # master
        Route::prefix('master')
            ->name('master.')
            ->group(function() {
                # development
                Route::prefix('development')
                ->name('development.')
                ->group(function() {
                    # command
                    Route::prefix('command')
                    ->name('command.')
                    ->group(function() {
                        Route::get('/', [App\Http\Controllers\Admin\Master\Development\CommandController::class, 'index'])->name('index');
                        Route::get('/execute', [App\Http\Controllers\Admin\Master\Development\CommandController::class, 'execute'])->name('execute');
                    });
                    # phpinfo
                    Route::prefix('phpinfo')
                    ->name('phpinfo.')
                    ->group(function() {
                        Route::get('/', [App\Http\Controllers\Admin\Master\Development\PhpinfoController::class, 'index'])->name('index');
                        Route::get('/info', [App\Http\Controllers\Admin\Master\Development\PhpinfoController::class, 'info'])->name('info');
                    });
                });

            });
    });