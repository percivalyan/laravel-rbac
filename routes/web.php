<?php

use Illuminate\Support\Facades\Route;
// Import Ctrl
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'auth_login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'useradmin'], function () {
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('panel/role', [RoleController::class, 'list']);
    Route::get('panel/role/add', [RoleController::class, 'add']);
    Route::post('panel/role/store', [RoleController::class, 'insert']);
    Route::get('panel/role/edit/{id}', [RoleController::class, 'edit']);
    Route::post('panel/role/edit/{id}', [RoleController::class, 'update']);
    Route::get('panel/role/delete/{id}', [RoleController::class, 'delete']);

    Route::get('panel/user', [UserController::class, 'list']);
    Route::get('panel/user/add', [UserController::class, 'add']);
    Route::post('panel/user/store', [UserController::class, 'insert']);
    Route::get('panel/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('panel/user/edit/{id}', [UserController::class, 'update']);
    Route::get('panel/user/delete/{id}', [UserController::class, 'delete']);
    Route::get('panel/user/edit-profile/{id}', [UserController::class, 'editProfile'])->name('user.edit-profile');
    Route::post('panel/user/edit-profile/{id}', [UserController::class, 'updateProfile']);

     Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
     Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
     Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
     Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
     Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
     Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
     Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
});
