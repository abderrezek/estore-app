<?php

use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::get("redirect/{provider}", [SocialiteController::class, "redirect"])->name("socialite.redirect");
Route::get("callback/{provider}", [SocialiteController::class, "callback"])->name("socialite.callback");
Route::get("new-password/{provider}", fn () => view('auths.new-password'))->name('new-password');
Route::post("new-password/{provider}", [SocialiteController::class, "addPassword"]);