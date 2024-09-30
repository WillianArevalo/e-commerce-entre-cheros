<?php

/** Routes Admin */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AddressController,
    AdminController,
    BrandController,
    CategorieController,
    ConfigurationController,
    CouponController,
    CurrencyController,
    CustomerController,
    FAQController,
    FlashOfferController,
    LabelController,
    OrderController,
    PaymentController,
    PoliciesController,
    PopupController,
    ProductController,
    ReviewController,
    SaleStrategyController,
    SettingsController,
    SettingsGeneralController,
    ShippingController,
    SubCategorieController,
    SupportTicketController,
    TaxController,
    TicketCommentController,
    UserController
};

// Public Admin Routes
Route::get("/admin/login", [AdminController::class, "login"])->name("admin.login");

// Admin Routes with Middleware
Route::middleware("role:admin")->prefix("admin")->name("admin.")->group(function () {

    // Dashboard
    Route::get("/", [AdminController::class, "index"])->name("index");

    // Categories
    Route::resource("/categories", CategorieController::class);
    Route::post("/categories/search", [CategorieController::class, "search"])->name("categories.search");

    // Subcategories
    Route::resource("/subcategories", SubCategorieController::class);
    Route::post("/subcategories/search", [SubCategorieController::class, "search"])->name("subcategories.search");

    // Brands
    Route::resource("/brands", BrandController::class);
    Route::post("/brands/search", [BrandController::class, "search"])->name("brands.search");

    // Products
    Route::resource("/products", ProductController::class);

    // Taxes
    Route::resource("/taxes", TaxController::class);

    // Labels
    Route::resource("/labels", LabelController::class);

    // Flash Offers
    Route::resource("/flash-offers", FlashOfferController::class);
    Route::prefix("/flash-offers")->name("flash-offers.")->group(function () {
        Route::post("/add-flash-offer", [FlashOfferController::class, "addFlashOffer"])->name("add-flash-offer");
        Route::post("/change-show/{id}", [FlashOfferController::class, "changeShow"])->name("change-show");
        Route::post("/change-status/{id}", [FlashOfferController::class, "changeStatus"])->name("change-status");
    });

    // Popups
    Route::resource("/popups", PopupController::class);

    // Users
    Route::resource("/users", UserController::class);

    // Customers
    Route::resource("/customers", CustomerController::class);

    // Addresses
    Route::resource("/addresses", AddressController::class);

    // Policies
    Route::resource("/policies", PoliciesController::class);
    Route::post("/policies/download/{id}", [PoliciesController::class, "download"])->name("policies.download");

    // FAQ
    Route::resource("/faq", FAQController::class);

    // Locale
    Route::get("locale/{locale}", [ConfigurationController::class, "setLocale"])->name("locale");

    // Settings
    Route::prefix("settings")->name("settings.")->group(function () {
        Route::get("/", [SettingsController::class, "index"])->name("index");
        Route::post("/update", [SettingsController::class, "update"])->name("update");
        Route::post("/change-color", [SettingsController::class, "changeColor"])->name("change-color");
        Route::post("/change-theme", [SettingsController::class, "changeTheme"])->name("change-theme");
        Route::post("/change-profile", [SettingsController::class, "changeProfilePhoto"])->name("change-profile");
    });

    // Support Tickets
    Route::resource("/support-tickets", SupportTicketController::class);
    Route::resource("/ticket-comment", TicketCommentController::class);
    Route::post("/support-tickets/asign/{id}", [SupportTicketController::class, "asign"])->name("support-tickets.asign");


    // Orders
    Route::resource("/orders", OrderController::class);
    Route::post("/order/status/{id}", [OrderController::class, "changeStatus"])->name("orders.status");
    Route::post("/orders/payment-status/{id}", [OrderController::class, "changePaymentStatus"])->name("orders.payment-status");

    // Sales Strategies
    Route::prefix("sales-strategies")->name("sales-strategies.")->group(function () {
        Route::get("/", [SaleStrategyController::class, "index"])->name("index");
        Route::resource("/coupon", CouponController::class);
        Route::resource("/shipping-methods", ShippingController::class);
        Route::resource("/payment-methods", PaymentController::class);
        Route::resource("/currencies", CurrencyController::class);
    });

    // General Settings
    Route::prefix("general-settings")->name("general-settings.")->group(function () {
        Route::get("/", [SettingsGeneralController::class, "index"])->name("index");
        Route::post("/maintenance/update", [SettingsGeneralController::class, "maintenanceUpdate"])->name("maintenance.update");
    });

    // Reviews 
    Route::resource("/reviews", ReviewController::class);
    Route::post("/reviews/status/{id}", [ReviewController::class, "changeStatus"])->name("reviews.status");
});