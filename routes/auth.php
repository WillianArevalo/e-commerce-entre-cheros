<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;

Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");
Route::get("/register", [AuthController::class, "showRegisterForm"])->name("register");
Route::post("/register", [AuthController::class, "register"])->name("register.post");
Route::post("/admin/validate", [AuthController::class, "validateAdmin"])->name("admin.validate");
Route::post("/validate", [AuthController::class, "validate"])->name("login.validate");

Route::get("/auth/google", [GoogleController::class, "redirectToGoogle"])->name("auth.google");
Route::get("/auth/google/callback", [GoogleController::class, "handleGoogleCallback"])->name("auth.google.callback");