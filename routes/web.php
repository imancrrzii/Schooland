<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::post('forgot-password', [AuthController::class, 'postForgotPassword']);
Route::get('forgot-password', [AuthController::class, 'forgotPassword']);
Route::get('reset', [AuthController::class, 'reset']);

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('admin/admin/index', function () {
    return view('admin.admin.index');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    //read
    Route::get('admin/admin/index', [AdminController::class, 'index']);
    //create
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    //update
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    //delete
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    //class url
    //read
    Route::get('admin/class/index', [ClassController::class, 'index']);
    //create
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    //update
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    //delete
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
});