<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FlashOfferController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleStrategyController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SettingsGeneralController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubCategorieController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/** Routes Store */
Route::get("/", [HomeController::class, "index"])->name("home");
Route::controller(ProductController::class)->group(function () {
    Route::get("/products/{id}/details", "details")->name("products.details");
});

Route::controller(StoreController::class)->group(function () {
    Route::get("/store", "index")->name("store");
    Route::get("/store/products", "products")->name("store.products");
    Route::get("/store/products/search/{search}/{value}", "search")->name("store.search");
});

Route::controller(FavoriteController::class)->group(function () {
    Route::get("/favorites", "index")->name("favorites");
    Route::post("/favorites/add/{id}", "addFavorite")->name("favorites.add");
    Route::post("/favorites/remove/{id}", "addFavorite")->name("favorites.remove");
});

Route::controller(CartController::class)->group(function () {
    Route::get("/cart", "index")->name("cart");
    Route::post("/cart/add/{id}", "add")->name("cart.add");
    Route::post("/cart/remove/{id}", "remove")->name("cart.remove");
    Route::post("/cart/plus/{id}", "plus")->name("cart.plus");
    Route::post("/cart/minus/{id}", "minus")->name("cart.minus");
});

Route::get("/checkout", [CheckoutController::class, "index"])->name("checkout");
Route::get("/categories", [CategorieController::class, "showCategoriesStore"])->name("categories");
Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");
Route::post("/login/validate", [AuthController::class, "validate"])->name("login.validate");
Route::get("/register", [AuthController::class, "showRegisterForm"])->name("register");

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
    Route::post("/brands/search", [BrandController::class, "search"])->name("brands.search");
    Route::resource("/products", ProductController::class);
    Route::resource("/taxes", TaxController::class);
    Route::resource("/labels", LabelController::class);
    Route::resource("/flash-offers", FlashOfferController::class);
    Route::post("/flash-offers/add-flash-offer", [FlashOfferController::class, "addFlashOffer"])->name("flash-offers.add-flash-offer");
    Route::post("/flash-offers/changeStatus", [FlashOfferController::class, "changeStatus"])->name("flash-offers.changeStatus");
    Route::resource("/popups", PopupController::class);
    Route::resource("/users", UserController::class);
    Route::resource("/customers", CustomerController::class);
    Route::get("/general-settings", [SettingsGeneralController::class, "index"])->name("general-settings");
    Route::resource("/policies", PoliciesController::class);
    Route::resource("/faq", FAQController::class);
    Route::get("locale/{locale}", [ConfigurationController::class, "setLocale"])->name("locale");
    Route::get("/settings", [SettingsController::class, "index"])->name("settings");
    Route::resource("/support-tickets", SupportTicketController::class);
    Route::resource("/orders", OrderController::class);
    Route::prefix("sales-strategies")->name("sales-strategies.")->group(function () {
        Route::get("/", [SaleStrategyController::class, "index"])->name("index");
        Route::resource("/coupon", CouponController::class);
        Route::resource("/shipping-methods", ShippingController::class);
    });
});

Route::post("/logout", [AuthController::class, "logout"])->name("logout");