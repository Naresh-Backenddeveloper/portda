<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BuyerController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PORTDA — Web Routes
|--------------------------------------------------------------------------
| Maps every Blade view (converted from the original HTML mockups) to a URL.
| Each closure simply returns a view; controllers can be wired in later.
*/

/* ------------------------------------------------------------------ */
/*  Marketing website                                                  */
/* ------------------------------------------------------------------ */
Route::view('/',              'website.index')->name('home');
Route::view('/for-buyers',    'website.for-buyers')->name('for-buyers');
Route::view('/for-vendors',   'website.for-vendors')->name('for-vendors');
Route::view('/how-it-works',  'website.how-it-works')->name('how-it-works');
Route::view('/pricing',       'website.pricing')->name('pricing');
Route::view('/contact',       'website.contact')->name('contact');

/* ------------------------------------------------------------------ */
/*  Auth (buyer / vendor)                                              */
/* ------------------------------------------------------------------ */
Route::get('/login',   [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',  [AuthController::class, 'login']);
Route::get('/signup',  [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ------------------------------------------------------------------ */
/*  Buyer web app                                                      */
/* ------------------------------------------------------------------ */
Route::prefix('buyer')->name('buyer.')->middleware(['auth','role:buyer,admin'])->group(function () {
    Route::get('/dashboard',     [DashboardController::class, 'buyer'])->name('dashboard');
    Route::get('/requests',      [BuyerController::class, 'requests'])->name('requests');
    Route::get('/new-request',   [BuyerController::class, 'newRequest'])->name('new-request');
    Route::post('/new-request',  [BuyerController::class, 'storeRequest']);
    Route::post('/requests/{serviceRequest}/cancel', [BuyerController::class, 'cancelRequest'])->name('requests.cancel');
    Route::get('/quotations',    [BuyerController::class, 'quotations'])->name('quotations');
    Route::post('/quotations/{quotation}/accept', [BuyerController::class, 'acceptQuotation'])->name('quotations.accept');
    Route::post('/quotations/{quotation}/reject', [BuyerController::class, 'rejectQuotation'])->name('quotations.reject');
    Route::get('/vendors',       [BuyerController::class, 'vendors'])->name('vendors');
    Route::get('/orders',        [BuyerController::class, 'orders'])->name('orders');
    Route::get('/payments',      [BuyerController::class, 'payments'])->name('payments');
    Route::get('/invoices',      [BuyerController::class, 'invoices'])->name('invoices');
    Route::get('/notifications', [BuyerController::class, 'notifications'])->name('notifications');
    Route::get('/chat',          [BuyerController::class, 'chat'])->name('chat');
    Route::get('/profile',       [BuyerController::class, 'profile'])->name('profile');
    Route::post('/profile',      [BuyerController::class, 'updateProfile']);
    Route::get('/kyc',           [BuyerController::class, 'kyc'])->name('kyc');
    Route::post('/kyc',          [BuyerController::class, 'storeKyc']);
    Route::delete('/kyc/{kyc}',  [BuyerController::class, 'destroyKyc']);
    Route::post('/chat/{room}/messages', [BuyerController::class, 'sendMessage'])->name('chat.send');
});

/* ------------------------------------------------------------------ */
/*  Vendor web app                                                     */
/* ------------------------------------------------------------------ */
Route::prefix('vendor')->name('vendor.')->middleware(['auth','role:vendor,admin'])->group(function () {
    Route::get('/dashboard',     [DashboardController::class, 'vendor'])->name('dashboard');
    Route::get('/inbox',         [VendorController::class, 'inbox'])->name('inbox');
    Route::get('/inbox/{serviceRequest}/quote', [VendorController::class, 'quoteForm'])->name('inbox.quote');
    Route::post('/quotations',   [VendorController::class, 'submitQuote']);
    Route::get('/quotations',    [VendorController::class, 'quotations'])->name('quotations');
    Route::get('/orders',        [VendorController::class, 'orders'])->name('orders');
    Route::post('/orders/{order}/start',    [VendorController::class, 'startOrder'])->name('orders.start');
    Route::post('/orders/{order}/complete', [VendorController::class, 'completeOrder'])->name('orders.complete');
    Route::get('/payouts',       [VendorController::class, 'payouts'])->name('payouts');
    Route::get('/billing',       [VendorController::class, 'billing'])->name('billing');
    Route::get('/reviews',       [VendorController::class, 'reviews'])->name('reviews');
    Route::get('/notifications', [VendorController::class, 'notifications'])->name('notifications');
    Route::get('/chat',          [VendorController::class, 'chat'])->name('chat');
    Route::get('/profile',       [VendorController::class, 'profile'])->name('profile');
    Route::post('/profile',      [VendorController::class, 'updateProfile']);
    Route::get('/kyc',           [VendorController::class, 'kyc'])->name('kyc');
    Route::post('/kyc',          [VendorController::class, 'storeKyc']);
    Route::delete('/kyc/{kyc}',  [VendorController::class, 'destroyKyc']);
    Route::post('/chat/{room}/messages', [VendorController::class, 'sendMessage'])->name('chat.send');
});

/* ------------------------------------------------------------------ */
/*  Admin console                                                      */
/* ------------------------------------------------------------------ */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',       [AuthController::class, 'showAdminLogin'])->name('login');
    Route::post('/login',      [AuthController::class, 'adminLogin']);
});

Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard',   [DashboardController::class, 'admin'])->name('dashboard');
    Route::get('/analytics',           [AdminController::class, 'analytics'])->name('analytics');

    Route::get('/vendors',             [AdminController::class, 'vendors'])->name('vendors');
    Route::get('/vendors/{user}',      [AdminController::class, 'vendorDetail'])->name('vendors.detail');
    Route::post('/vendors/{user}/verify',  [AdminController::class, 'verifyVendor']);
    Route::post('/vendors/{user}/reject',  [AdminController::class, 'rejectVendor']);
    Route::post('/vendors/{user}/premium', [AdminController::class, 'togglePremium']);
    Route::get('/users',               [AdminController::class, 'users'])->name('users');
    Route::get('/users/{user}',        [AdminController::class, 'buyerDetail'])->name('users.detail');
    Route::post('/users/{user}/suspend',  [AdminController::class, 'suspendUser']);
    Route::post('/users/{user}/activate', [AdminController::class, 'activateUser']);
    Route::get('/kyc',                 [AdminController::class, 'kyc'])->name('kyc');
    Route::post('/kyc/{kyc}/approve',  [AdminController::class, 'approveKyc']);
    Route::post('/kyc/{kyc}/reject',   [AdminController::class, 'rejectKyc']);
    Route::get('/admins',              [AdminController::class, 'admins'])->name('admins');

    Route::get('/requests',            [AdminController::class, 'requests'])->name('requests');
    Route::get('/quote-moderation',    [AdminController::class, 'quoteModeration'])->name('quote-moderation');
    Route::post('/quotations/{quotation}/flag', [AdminController::class, 'flagQuotation']);
    Route::get('/orders',              [AdminController::class, 'orders'])->name('orders');
    Route::get('/orders/{order}',      [AdminController::class, 'orderDetail'])->name('orders.detail');
    Route::post('/orders/{order}/complete', [AdminController::class, 'forceCompleteOrder']);
    Route::post('/orders/{order}/cancel',   [AdminController::class, 'forceCancelOrder']);
    Route::get('/reviews',             [AdminController::class, 'reviews'])->name('reviews');
    Route::get('/disputes',            [AdminController::class, 'disputes'])->name('disputes');
    Route::post('/disputes/{dispute}/resolve',  [AdminController::class, 'resolveDispute']);
    Route::post('/disputes/{dispute}/escalate', [AdminController::class, 'escalateDispute']);

    Route::get('/payments',            [AdminController::class, 'payments'])->name('payments');
    Route::post('/payments/{payment}/verify', [AdminController::class, 'verifyPayment']);
    Route::post('/payments/{payment}/fail',   [AdminController::class, 'failPayment']);
    Route::get('/commission',          [AdminController::class, 'commission'])->name('commission');
    Route::post('/commission',         [AdminController::class, 'storeCommission']);
    Route::delete('/commission/{commission}', [AdminController::class, 'deleteCommission']);
    Route::get('/subscriptions',       [AdminController::class, 'subscriptions'])->name('subscriptions');
    Route::get('/plans',               [AdminController::class, 'plans'])->name('plans');
    Route::post('/plans',              [AdminController::class, 'storePlan']);
    Route::delete('/plans/{plan}',     [AdminController::class, 'deletePlan']);

    Route::get('/categories',          [AdminController::class, 'categories'])->name('categories');
    Route::get('/categories/{category}', [AdminController::class, 'categoryDetail'])->name('categories.detail');
    Route::get('/categories-new',      [AdminController::class, 'categoryNew'])->name('categories.new');
    Route::post('/categories',         [AdminController::class, 'storeCategory']);
    Route::delete('/categories/{category}', [AdminController::class, 'deleteCategory']);
    Route::get('/subservices/new',     [AdminController::class, 'subserviceNew'])->name('subservices.new');
    Route::post('/subservices',        [AdminController::class, 'storeSubservice']);
    Route::get('/ports',               [AdminController::class, 'ports'])->name('ports');
    Route::post('/ports',              [AdminController::class, 'storePort']);
    Route::delete('/ports/{port}',     [AdminController::class, 'deletePort']);

    Route::get('/broadcast',           [AdminController::class, 'broadcast'])->name('broadcast');
    Route::post('/broadcast',          [AdminController::class, 'storeBroadcast']);
    Route::post('/broadcast/{broadcast}/send', [AdminController::class, 'sendBroadcast']);
    Route::get('/audit',               [AdminController::class, 'audit'])->name('audit');
});

/* ------------------------------------------------------------------ */
/*  Mobile-app screen previews (buyer + vendor)                        */
/* ------------------------------------------------------------------ */
Route::prefix('mobile/buyer')->name('mobile.buyer.')->group(function () {
    Route::view('/',                    'buyer.index')->name('index');
    Route::view('/01-onboarding',       'buyer.01-onboarding')->name('onboarding');
    Route::view('/02-auth',             'buyer.02-auth')->name('auth');
    Route::view('/03-home',             'buyer.03-home')->name('home');
    Route::view('/04-service-request',  'buyer.04-service-request')->name('service-request');
    Route::view('/05-quotations',       'buyer.05-quotations')->name('quotations');
    Route::view('/06-chat',             'buyer.06-chat')->name('chat');
    Route::view('/07-orders',           'buyer.07-orders')->name('orders');
    Route::view('/08-payments',         'buyer.08-payments')->name('payments');
    Route::view('/09-reviews',          'buyer.09-reviews')->name('reviews');
    Route::view('/10-notifications',    'buyer.10-notifications')->name('notifications');
    Route::view('/11-profile',          'buyer.11-profile')->name('profile');
    Route::view('/12-settings',         'buyer.12-settings')->name('settings');
});

Route::prefix('mobile/vendor')->name('mobile.vendor.')->group(function () {
    Route::view('/',                   'vendor.index')->name('index');
    Route::view('/01-onboarding',      'vendor.01-onboarding')->name('onboarding');
    Route::view('/02-auth',            'vendor.02-auth')->name('auth');
    Route::view('/03-home',            'vendor.03-home')->name('home');
    Route::view('/04-rfq-inbox',       'vendor.04-rfq-inbox')->name('rfq-inbox');
    Route::view('/05-quotations',      'vendor.05-quotations')->name('quotations');
    Route::view('/06-chat',            'vendor.06-chat')->name('chat');
    Route::view('/07-jobs',            'vendor.07-jobs')->name('jobs');
    Route::view('/08-payouts',         'vendor.08-payouts')->name('payouts');
    Route::view('/09-reviews',         'vendor.09-reviews')->name('reviews');
    Route::view('/10-notifications',   'vendor.10-notifications')->name('notifications');
    Route::view('/11-profile',         'vendor.11-profile')->name('profile');
    Route::view('/12-settings',        'vendor.12-settings')->name('settings');
});
