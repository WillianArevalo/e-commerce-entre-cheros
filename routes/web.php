<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::controller(ProductController::class)->group(function () {
    Route::get("/products/{id}/details", "details")->name("products.details");
});

Route::get("/cart", [CartController::class, "index"])->name("cart");
Route::get("/checkout", [CheckoutController::class, "index"])->name("checkout");
Route::get("/categorys", [CategoryController::class, "index"])->name("categorys");

Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");

Route::get("/admin/login", [AdminController::class, "login"])->name("admin.login");
Route::post("/admin/validate", [AuthController::class, "validateAdmin"])->name("admin.validate");
Route::middleware("role:admin")->prefix("admin")->name("admin.")->group(function () {
    Route::get("/", [AdminController::class, "index"])->name("index");
});

Route::post("/logout", [AuthController::class, "logout"])->name("logout");
