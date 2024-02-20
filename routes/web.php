<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\EmployerController;
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

Route::middleware('common_data')->group(function (){ // this middleware is fetching common header and footer data and sharing with every view

    Route::get('/', [HomePageController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactusController::class, 'index'])->name('contact');
    Route::get('/job-list', [ContactusController::class, 'index'])->name('job-list');
    Route::get('/job-category', [ContactusController::class, 'index'])->name('job-category');


    Route::get('/system-admin-login', [UserController::class, 'Login']);
    Route::post('/system-admin-login', [UserController::class, 'MakeLogin']);


    Route::get('/applicant-login', [ApplicantController::class, 'Login'])->name('applicant.login');
    Route::get('/employer-login', [EmployerController::class, 'Login'])->name('employer.login');
});



Route::middleware('auth.jwt')->group(function () {
    Route::get('/system-admin', [AdminController::class, 'index']);
    Route::get('/system-admin-logout', [UserController::class, 'logout'])->name('system-admin-logout');

    /*
     * |--------------------------------------------------
     * spatie role and permission
     * resource routes start
     * |--------------------------------------------------
     */

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('company-info', [CompanyInfoController::class, 'index']);


    /*
     * |--------------------------------------------------
     * spatie role and permission
     * resource routes end
     * |--------------------------------------------------
     */


    Route::get('/about-settings', [AboutController::class, 'edit'])->name('about-settings');
    Route::patch('/about-settings/{id}', [AboutController::class, 'update'])->name('about-settings.update');


    Route::get('/contact-settings', [ContactusController::class, 'edit'])->name('contact-settings');
    Route::patch('/contact-settings/{id}', [ContactusController::class, 'update'])->name('contact-settings.update');

});
