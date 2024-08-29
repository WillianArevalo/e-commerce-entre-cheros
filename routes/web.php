<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FlashOfferController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
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
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Route;


/** Routes Store */
Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");
Route::post("/login/validate", [AuthController::class, "validate"])->name("login.validate");
Route::get("/register", [AuthController::class, "showRegisterForm"])->name("register");

/* Pages */
Route::get("/about", [AboutController::class, "index"])->name("about");
Route::get("/faq", [FAQController::class, "showFaqsStore"])->name("faq");
Route::get("/contact", [ContactController::class, "index"])->name("contact");

Route::middleware("auth")->group(function () {
    Route::prefix("account")->name("account.")->group(function () {
        Route::get("/", [AccountController::class, "index"])->name("index");
        Route::get("/settings", [AccountController::class, "settings"])->name("settings");
        Route::get("/settings-edit", [AccountController::class, "settingsEdit"])->name("settings-edit");
        Route::post("/settings-update", [AccountController::class, "settingsUpdate"])->name("settings-update");
        Route::get("/change-password", [AccountController::class, "changePassword"])->name("change-password");
        Route::post("/edit-password", [AccountController::class, "editPassword"])->name("edit-password");
        Route::get('/addresses/{slug}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
        Route::resource("/addresses", AddressController::class);
    });
});

Route::get("/orders", [OrderController::class, "showOrdersStore"])->name("orders");
Route::post("/orders/info-add", [OrderController::class, "addInfoCustomer"])->name("orders.add-info");

Route::controller(ProductController::class)->group(function () {
    Route::get("/products/{slug}", "details")->name("products.details");
});

Route::get("/polices/{slug}", [PoliciesController::class, "showPolicy"])->name("policies.show");

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
    Route::post("/cart/update/{id}", "update")->name("cart.update");
    Route::get("/cart/applied-coupon/{id}", "appliedCoupon")->name("cart.applied-coupon");
    Route::post("/cart/apply-coupon", "applyCoupon")->name("cart.apply-coupon");
    Route::post("/cart/apply-shipping-method", "applyShippingMethod")->name("cart.apply-shipping-method");
    Route::post("/cart/apply-payment-method", "applyPaymentMethod")->name("cart.apply-payment-method");
    Route::post("/cart/remove-coupon/{id}", "removeCoupon")->name("cart.remove-coupon");
});

Route::get("/my-coupons", [CouponController::class, "myCoupons"])->name("mycoupons");

Route::get("/checkout", [CheckoutController::class, "index"])->name("checkout");
Route::get("/categories", [CategorieController::class, "showCategoriesStore"])->name("categories");

/** Routes Admin */
Route::get("/admin/login", [AdminController::class, "login"])->name("admin.login");
Route::post("/admin/validate", [AuthController::class, "validateAdmin"])->name("admin.validate");

Route::middleware("role:admin")->prefix("admin")->name("admin.")->group(function () {
    Route::get("/", [AdminController::class, "index"])->name("index");

    Route::resource("/categories", CategorieController::class);
    Route::post("/categories/search", [CategorieController::class, "search"])->name("categories.search");

    Route::resource("/subcategories", SubCategorieController::class);
    Route::post("/subcategories/search", [SubCategorieController::class, "search"])->name("subcategories.search");

    Route::resource("/brands", BrandController::class);
    Route::post("/brands/search", [BrandController::class, "search"])->name("brands.search");

    Route::resource("/products", ProductController::class);
    Route::resource("/taxes", TaxController::class);
    Route::resource("/labels", LabelController::class);

    Route::resource("/flash-offers", FlashOfferController::class);
    Route::prefix("/flash-offers")->name("flash-offers.")->group(function () {
        Route::post("/add-flash-offer", [FlashOfferController::class, "addFlashOffer"])->name("add-flash-offer");
        Route::post("/change-show/{id}", [FlashOfferController::class, "changeShow"])->name("change-show");
        Route::post("/change-status/{id}", [FlashOfferController::class, "changeStatus"])->name("change-status");
    });

    Route::resource("/popups", PopupController::class);
    Route::resource("/users", UserController::class);
    Route::resource("/customers", CustomerController::class);

    Route::resource("/policies", PoliciesController::class);
    Route::post("/policies/download/{id}", [PoliciesController::class, "download"])->name("policies.download");
    Route::resource("/faq", FAQController::class);
    Route::get("locale/{locale}", [ConfigurationController::class, "setLocale"])->name("locale");
    Route::get("/settings", [SettingsController::class, "index"])->name("settings");
    Route::resource("/support-tickets", SupportTicketController::class);
    Route::resource("/orders", OrderController::class);

    Route::prefix("sales-strategies")->name("sales-strategies.")->group(function () {
        Route::get("/", [SaleStrategyController::class, "index"])->name("index");
        Route::resource("/coupon", CouponController::class);
        Route::resource("/shipping-methods", ShippingController::class);
        Route::resource("/payment-methods", PaymentController::class);
        Route::resource("/currencies", CurrencyController::class);
    });

    Route::prefix("general-settings")->name("general-settings.")->group(function () {
        Route::get("/", [SettingsGeneralController::class, "index"])->name("index");
        Route::post("/maintenance/update", [SettingsGeneralController::class, "maintenanceUpdate"])->name("maintenance.update");
    });
});

Route::post("/logout", [AuthController::class, "logout"])->name("logout");