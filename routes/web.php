<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PayloadExcavatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'login_post'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function(){

    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/payload/exa', [PayloadExcavatorController::class, 'index'])->name('payload.ex.index');
    Route::get('/payload/api', [PayloadExcavatorController::class, 'api'])->name('payload.ex.api');
    Route::get('/payload/excel', [PayloadExcavatorController::class, 'exportExcel'])->name('payload.ex.excel');

});
