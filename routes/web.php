<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomePageController::class, 'index']);


Route::get('/system-admin-login', [UserController::class, 'Login']);
Route::post('/system-admin-login', [UserController::class, 'MakeLogin']);

Route::middleware('auth.jwt')->group(function () {
    Route::get('/system-admin', [AdminController::class, 'index']);
    Route::get('/system-admin-logout', [UserController::class, 'logout']);


    /*
     * |--------------------------------------------------
     * spatie role and permission
     * resource routes start
     * |--------------------------------------------------
     */

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


    /*
     * |--------------------------------------------------
     * spatie role and permission
     * resource routes end
     * |--------------------------------------------------
     */
});
