<?php

use App\Http\Controllers\Admin\Auths\LoginController;

// Routes Admin eShop
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

  Route::get("/dashboard", fn () => view('admin.dashboard'))->name('dashboard');

  // Admin Login
  // Route::post("/login", [LoginController::class, 'store'])->name('login.post');

});

// Admin Login
// Route::get("admin/login", [LoginController::class, 'create'])->name("admin.login.get");