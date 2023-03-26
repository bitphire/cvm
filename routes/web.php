<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConcreteController;
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


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('company', [App\Http\Crontrollers\Admin\CompanyController::class, 'index']);
    Route::get('company/add', [App\Http\Crontrollers\Admin\CompanyController::class, 'create']);
    Route::get('company', [App\Http\Crontrollers\Admin\CompanyController::class, 'store']);

    // Vehicle Routes
    Route::get('vehicle/list', [App\Http\Controllers\Admin\VehicleController::class, 'index']);
    Route::get('vehicle/add', [App\Http\Controllers\Admin\VehicleController::class, 'create']);
    Route::post('vehicle/list', [App\Http\Controllers\Admin\VehicleController::class, 'store']);

    // Concrete Routes
    Route::controller(ConcreteController::class)->group(function () {
        Route::get('concrete', 'index');
        Route::get('concrete/add', 'create');
        Route::post('concrete', 'store');
        Route::get('concrete/{concrete}/edit', 'edit');
        Route::put('concrete/{concrete}', 'update');
        Route::post('concrete/{concrete}/destroy', 'destroy');
        Route::get('concrete/completed', 'completed');
        Route::post('concrete/{concrete}/restore', 'restore');
    });
});
