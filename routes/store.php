<?php

/** Routes Store */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PoliciesController;
use App\Http\Controllers\Store\{
    CategoryController,
    FAQController,
    OrderController,
    ProductController,
    AboutController,
    AccountController,
    AddressController,
    CheckoutController,
    ContactController,
    CouponController,
    CustomerController,
    FavoriteController,
    HomeController,
    ReviewController,
    StoreController,
    CartController,
    SupportTicketController
};

// Public Routes
Route::get("/", [HomeController::class, "index"])->name("home");

// Pages
Route::get("/about", [AboutController::class, "index"])->name("about");
Route::get("/faq", [FAQController::class, "index"])->name("faq");
Route::get("/contact", [ContactController::class, "index"])->name("contact");

// Products
Route::controller(ProductController::class)->group(function () {
    Route::get("/products/{slug}", "details")->name("products.details");
    Route::post("/products/filter", [ProductController::class, "filter"])->name("products.filter");
});

// Policies
Route::get("/polices/{slug}", [PoliciesController::class, "showPolicy"])->name("policies.show");

// Store
Route::controller(StoreController::class)->group(function () {
    Route::get("/store", "index")->name("store");
    Route::get("/store/products", "products")->name("store.products");
    Route::get("/store/products/search/{search}/{value}", "search")->name("store.search");
});

// Cart
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
    Route::post("/cart/destroy", "destroy")->name("cart.destroy");
});

// Categories
Route::get("/categories", [CategoryController::class, "showCategoriesStore"])->name("categories");

// Authenticated Routes
Route::middleware("auth")->group(function () {

    // Account Management
    Route::prefix("account")->name("account.")->group(function () {
        Route::get("/", [AccountController::class, "index"])->name("index");
        Route::get("/settings", [AccountController::class, "settings"])->name("settings");
        Route::get("/settings-edit", [AccountController::class, "settingsEdit"])->name("settings-edit");
        Route::post("/settings-update", [AccountController::class, "settingsUpdate"])->name("settings-update");
        Route::get("/change-password", [AccountController::class, "changePassword"])->name("change-password");
        Route::post("/edit-password", [AccountController::class, "editPassword"])->name("edit-password");
        Route::resource("/addresses", AddressController::class);
        Route::resource("/tickets", SupportTicketController::class);
        Route::post("/tickets/{id}/close", [SupportTicketController::class, "close"])->name("tickets.close");
    });

    // Orders
    Route::post("/orders/info-add", [CustomerController::class, "store"])->name("customer.store");
    Route::get("/orders/{number_order}", [OrderController::class, "show"])->name("orders.show");
    Route::post("/order/cancel/{id}", [OrderController::class, "cancel"])->name("order.cancel");
    Route::post("/order/add-comment/{id}", [OrderController::class, "addComment"])->name("order.add-comment");
    Route::post("/order-remove-comment/{id}", [OrderController::class, "removeComment"])->name("order.remove-comment");
    Route::resource("/orders", OrderController::class);

    // Favorites
    Route::controller(FavoriteController::class)->group(function () {
        Route::get("/favorites", "index")->name("favorites");
        Route::post("/favorites/add/{id}", "addFavorite")->name("favorites.add");
        Route::post("/favorites/remove/{id}", "removeFavorite")->name("favorites.remove");
    });

    // Coupons
    Route::get("/my-coupons", [CouponController::class, "index"])->name("mycoupons");

    // Checkout
    Route::get("/checkout", [CheckoutController::class, "index"])->name("checkout");

    // Reviews
    Route::resource("/reviews", ReviewController::class);
});