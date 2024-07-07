<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FlashOfferController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategorieController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserController;
use App\Models\SubCategorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/** Routes Store */
Route::get("/", [HomeController::class, "index"])->name("home");
Route::controller(ProductController::class)->group(function () {
    Route::get("/products/{id}/details", "details")->name("products.details");
});

Route::get("/cart", [CartController::class, "index"])->name("cart");
Route::get("/checkout", [CheckoutController::class, "index"])->name("checkout");
Route::get("/categories", [CategorieController::class, "showCategoriesStore"])->name("categories");
Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");


/** Routes Admin */
Route::get("/admin/login", [AdminController::class, "login"])->name("admin.login");
Route::post("/admin/validate", [AuthController::class, "validateAdmin"])->name("admin.validate");

Route::middleware("role:admin")->prefix("admin")->name("admin.")->group(function () {
    Route::get("/", [AdminController::class, "index"])->name("index");
    Route::resource("/categories", CategorieController::class);
    Route::resource("/subcategories", SubCategorieController::class);
    Route::post("/categories/search", [CategorieController::class, "search"])->name("categories.search");
    Route::post("/subcategories/search", [SubCategorieController::class, "search"])->name("subcategories.search");
    Route::resource("/brands", BrandController::class);
    Route::resource("/products", ProductController::class);
    Route::resource("/taxes", TaxController::class);
    Route::resource("/labels", LabelController::class);
    Route::resource("/flash-offers", FlashOfferController::class);
    Route::post("/flash-offers/add-flash-offer", [FlashOfferController::class, "addFlashOffer"])->name("flash-offers.add-flash-offer");
    Route::post("/flash-offers/changeStatus", [FlashOfferController::class, "changeStatus"])->name("flash-offers.changeStatus");
    Route::resource("/popups", PopupController::class);
    Route::resource("/users", UserController::class);
});

Route::post("/logout", [AuthController::class, "logout"])->name("logout");