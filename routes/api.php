<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\KycController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\QuotationController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\ServiceRequestController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\VendorDirectoryController;
use App\Http\Controllers\Api\Admin as A;
use Illuminate\Support\Facades\Route;

/* ----------------- Public ----------------- */
Route::prefix('auth')->group(function () {
    Route::post('register',    [AuthController::class, 'register']);
    Route::post('login',       [AuthController::class, 'login']);
    Route::post('otp/request', [AuthController::class, 'requestOtp']);
    Route::post('otp/verify',  [AuthController::class, 'verifyOtp']);
});

Route::prefix('catalog')->group(function () {
    Route::get('ports',                  [CatalogController::class, 'ports']);
    Route::get('categories',             [CatalogController::class, 'categories']);
    Route::get('categories/{id}',        [CatalogController::class, 'category']);
    Route::get('plans',                  [CatalogController::class, 'plans']);
    Route::get('hero-slides',            [CatalogController::class, 'heroSlides']);
});

Route::get('vendors',          [VendorDirectoryController::class, 'index']);
Route::get('vendors/{vendor}', [VendorDirectoryController::class, 'show']);
Route::get('reviews',          [ReviewController::class, 'index']);
Route::get('reviews/{review}', [ReviewController::class, 'show']);

/* ----------------- Authenticated (any role) ----------------- */
Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::get('me',          [AuthController::class, 'me']);
        Route::post('logout',     [AuthController::class, 'logout']);
        Route::post('password',   [AuthController::class, 'updatePassword']);
    });

    /* Profile */
    Route::get('profile',                       [ProfileController::class, 'show']);
    Route::put('profile',                       [ProfileController::class, 'update']);
    Route::post('profile/avatar',               [ProfileController::class, 'uploadAvatar']);
    Route::post('profile/vendor/categories',    [ProfileController::class, 'syncVendorCategories']);
    Route::post('profile/vendor/ports',         [ProfileController::class, 'syncVendorPorts']);

    /* KYC */
    Route::get('kyc',           [KycController::class, 'index']);
    Route::get('kyc/status',    [KycController::class, 'status']);
    Route::post('kyc',          [KycController::class, 'store']);
    Route::delete('kyc/{kyc}',  [KycController::class, 'destroy']);

    /* Dashboard */
    Route::get('dashboard', [DashboardController::class, 'summary']);

    /* Service Requests */
    Route::get('requests',                          [ServiceRequestController::class, 'index']);
    Route::post('requests',                         [ServiceRequestController::class, 'store']);
    Route::get('requests/{serviceRequest}',         [ServiceRequestController::class, 'show']);
    Route::put('requests/{serviceRequest}',         [ServiceRequestController::class, 'update']);
    Route::delete('requests/{serviceRequest}',      [ServiceRequestController::class, 'destroy']);
    Route::post('requests/{serviceRequest}/cancel', [ServiceRequestController::class, 'cancel']);

    /* Quotations */
    Route::get('quotations',                        [QuotationController::class, 'index']);
    Route::post('quotations',                       [QuotationController::class, 'store']);
    Route::get('quotations/{quotation}',            [QuotationController::class, 'show']);
    Route::put('quotations/{quotation}',            [QuotationController::class, 'update']);
    Route::post('quotations/{quotation}/withdraw',  [QuotationController::class, 'withdraw']);
    Route::post('quotations/{quotation}/accept',    [QuotationController::class, 'accept']);
    Route::post('quotations/{quotation}/reject',    [QuotationController::class, 'reject']);
    Route::post('quotations/{quotation}/revisions', [QuotationController::class, 'proposeRevision']);

    /* Orders */
    Route::get('orders',                       [OrderController::class, 'index']);
    Route::get('orders/{order}',               [OrderController::class, 'show']);
    Route::post('orders/{order}/start',        [OrderController::class, 'start']);
    Route::post('orders/{order}/complete',     [OrderController::class, 'complete']);
    Route::post('orders/{order}/cancel',       [OrderController::class, 'cancel']);
    Route::post('orders/{order}/reschedule',   [OrderController::class, 'reschedule']);

    /* Payments */
    Route::get('payments',                       [PaymentController::class, 'index']);
    Route::get('payments/{payment}',             [PaymentController::class, 'show']);
    Route::post('payments/initiate',             [PaymentController::class, 'initiate']);
    Route::post('payments/{payment}/confirm',    [PaymentController::class, 'confirm']);
    Route::post('payments/offline',              [PaymentController::class, 'submitOffline']);
    Route::post('payments/{payment}/verify',     [PaymentController::class, 'verifyOffline'])->middleware('role:admin');

    /* Reviews */
    Route::post('reviews',                       [ReviewController::class, 'store']);
    Route::post('reviews/{review}/reply',        [ReviewController::class, 'reply']);

    /* Chat */
    Route::get('chat/rooms',                     [ChatController::class, 'index']);
    Route::post('chat/rooms',                    [ChatController::class, 'openWith']);
    Route::get('chat/rooms/{room}',              [ChatController::class, 'show']);
    Route::post('chat/rooms/{room}/messages',    [ChatController::class, 'sendMessage']);
    Route::post('chat/rooms/{room}/read',        [ChatController::class, 'markRead']);

    /* Notifications */
    Route::get('notifications',                  [NotificationController::class, 'index']);
    Route::get('notifications/unread-count',     [NotificationController::class, 'unreadCount']);
    Route::post('notifications/read-all',        [NotificationController::class, 'markAllRead']);
    Route::post('notifications/{notification}/read', [NotificationController::class, 'markRead']);
    Route::delete('notifications/{notification}',    [NotificationController::class, 'destroy']);

    /* Subscriptions */
    Route::get('subscriptions',                       [SubscriptionController::class, 'index']);
    Route::get('subscriptions/current',               [SubscriptionController::class, 'current']);
    Route::post('subscriptions',                      [SubscriptionController::class, 'subscribe']);
    Route::post('subscriptions/{subscription}/cancel',[SubscriptionController::class, 'cancel']);

    /* ----------------- Admin only ----------------- */
    Route::prefix('admin')->middleware('role:admin')->group(function () {

        Route::get('users',                   [A\UserController::class, 'index']);
        Route::get('users/{user}',            [A\UserController::class, 'show']);
        Route::put('users/{user}',            [A\UserController::class, 'update']);
        Route::post('users/{user}/suspend',   [A\UserController::class, 'suspend']);
        Route::post('users/{user}/activate',  [A\UserController::class, 'activate']);
        Route::delete('users/{user}',         [A\UserController::class, 'destroy']);

        Route::get('vendors',                       [A\VendorController::class, 'index']);
        Route::get('vendors/{vendor}',              [A\VendorController::class, 'show']);
        Route::post('vendors/{vendor}/verify',      [A\VendorController::class, 'verify']);
        Route::post('vendors/{vendor}/reject',      [A\VendorController::class, 'reject']);
        Route::post('vendors/{vendor}/premium',     [A\VendorController::class, 'togglePremium']);

        Route::get('kyc',                  [A\KycController::class, 'index']);
        Route::post('kyc/{kyc}/approve',   [A\KycController::class, 'approve']);
        Route::post('kyc/{kyc}/reject',    [A\KycController::class, 'reject']);

        Route::get('requests',                            [A\ServiceRequestController::class, 'index']);
        Route::get('requests/{request_}',                 [A\ServiceRequestController::class, 'show']);
        Route::post('requests/{request_}/cancel',         [A\ServiceRequestController::class, 'forceCancel']);

        Route::get('quotations',                  [A\QuotationController::class, 'index']);
        Route::post('quotations/{quotation}/flag',[A\QuotationController::class, 'flag']);

        Route::get('orders',                       [A\OrderController::class, 'index']);
        Route::get('orders/{order}',               [A\OrderController::class, 'show']);
        Route::post('orders/{order}/complete',     [A\OrderController::class, 'forceComplete']);
        Route::post('orders/{order}/cancel',       [A\OrderController::class, 'forceCancel']);

        Route::get('payments',                       [A\PaymentController::class, 'index']);
        Route::post('payments/{payment}/verify',     [A\PaymentController::class, 'verifyOffline']);
        Route::post('payments/{payment}/fail',       [A\PaymentController::class, 'markFailed']);
        Route::get('payouts',                        [A\PaymentController::class, 'payouts']);
        Route::post('payouts/{payout}/process',      [A\PaymentController::class, 'processPayout']);

        Route::get('disputes',                       [A\DisputeController::class, 'index']);
        Route::get('disputes/{dispute}',             [A\DisputeController::class, 'show']);
        Route::post('disputes/{dispute}/resolve',    [A\DisputeController::class, 'resolve']);
        Route::post('disputes/{dispute}/escalate',   [A\DisputeController::class, 'escalate']);

        Route::get('broadcasts',                     [A\BroadcastController::class, 'index']);
        Route::post('broadcasts',                    [A\BroadcastController::class, 'store']);
        Route::post('broadcasts/{broadcast}/send',   [A\BroadcastController::class, 'send']);

        Route::get('analytics',  [A\AnalyticsController::class, 'summary']);
        Route::get('audit',      [A\AnalyticsController::class, 'audit']);

        /* Catalog CRUD */
        Route::get('categories',              [A\CatalogController::class, 'categoriesIndex']);
        Route::post('categories',             [A\CatalogController::class, 'categoriesStore']);
        Route::put('categories/{category}',   [A\CatalogController::class, 'categoriesUpdate']);
        Route::delete('categories/{category}',[A\CatalogController::class, 'categoriesDestroy']);

        Route::get('subcategories',                   [A\CatalogController::class, 'subcategoriesIndex']);
        Route::post('subcategories',                  [A\CatalogController::class, 'subcategoriesStore']);
        Route::put('subcategories/{subcategory}',     [A\CatalogController::class, 'subcategoriesUpdate']);
        Route::delete('subcategories/{subcategory}',  [A\CatalogController::class, 'subcategoriesDestroy']);

        Route::get('ports',          [A\CatalogController::class, 'portsIndex']);
        Route::post('ports',         [A\CatalogController::class, 'portsStore']);
        Route::put('ports/{port}',   [A\CatalogController::class, 'portsUpdate']);
        Route::delete('ports/{port}',[A\CatalogController::class, 'portsDestroy']);

        Route::get('plans',          [A\CatalogController::class, 'plansIndex']);
        Route::post('plans',         [A\CatalogController::class, 'plansStore']);
        Route::put('plans/{plan}',   [A\CatalogController::class, 'plansUpdate']);
        Route::delete('plans/{plan}',[A\CatalogController::class, 'plansDestroy']);

        Route::get('commissions',                  [A\CatalogController::class, 'commissionsIndex']);
        Route::post('commissions',                 [A\CatalogController::class, 'commissionsStore']);
        Route::put('commissions/{commission}',     [A\CatalogController::class, 'commissionsUpdate']);
        Route::delete('commissions/{commission}',  [A\CatalogController::class, 'commissionsDestroy']);
    });
});
