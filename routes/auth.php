<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");
Route::get("/register", [AuthController::class, "showRegisterForm"])->name("register");
Route::post("/admin/validate", [AuthController::class, "validateAdmin"])->name("admin.validate");