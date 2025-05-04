<?php

use App\Http\Controllers\apis\AuthController;
use App\Http\Controllers\apis\OrderController;
use App\Http\Controllers\apis\PaymentController;
use App\Http\Controllers\apis\ServiceController;
use App\Http\Controllers\apis\WalletController;
use App\Http\Controllers\apis\BlogController;
use App\Http\Controllers\apis\NewsUpdateController;
use App\Http\Controllers\webController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceStatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::name('apis')->middleware("error_handle")->group(function () {

    Route::post("/login", [AuthController::class, 'login'])->name("login");
    Route::post("/register", [AuthController::class, 'register'])->name("register");
    Route::post("/forgot", [AuthController::class, 'forgot'])->name("forgot");
    Route::post("/verify-otp", [AuthController::class, 'verifyOtp'])->name("verify");
    Route::post("/reset-password", [AuthController::class, 'resetPassword'])->name("reset");

    Route::get("news", [NewsUpdateController::class, "news"])->name("news.index");
    Route::get("updates", [NewsUpdateController::class, "updates"])->name("updates.index");
    Route::get("slider-home", [NewsUpdateController::class, 'sliderHome'])->name("sliderHome.index");
    Route::get("banner-trending", [NewsUpdateController::class, 'bannerTrending'])->name("bannerTrending.index");
    Route::get("banner-home", [NewsUpdateController::class, 'bannerHome'])->name("bannerHome.index");
    Route::get("appListTrending", [ServiceStatusController::class, 'appListTrending'])->name("appListTrending.index");
    Route::get("appListFeatured", [ServiceStatusController::class, 'appListFeatured'])->name("appListFeatured.index");
    Route::get("blogs/{category}", [BlogController::class, "blogs_category"])->name("blog.category");
    Route::get("/blog/{id}/show", [BlogController::class, 'blog_view'])->name('blog.show');
    Route::post("/contact", [webController::class, "contact"])->name("contact.post");


    // services routes
    Route::get("/services", [ServiceController::class, 'index'])->name('service.index');
    Route::get("/search", [ServiceController::class, 'search'])->name('service.search');
    Route::get("/service/{category}/category", [ServiceController::class, 'serviceByCategory'])->name('service.category.index');
    Route::get("/service/{id}/show", [ServiceController::class, 'show'])->name('service.show');



    Route::middleware(['user'])->prefix('users')->name('user.')->group(function () {
        Route::resource('tickets', TicketController::class);
        Route::post('tickets/{ticket}/messages', [MessageController::class, 'store'])->name('messages.store');
        Route::post('tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
     });

    // Account Routes Group
    Route::middleware("user")->group(function () {
        Route::get("/profile", [AuthController::class, "profile"])->name('profile');
        Route::post("/profile/update", [AuthController::class, "update"])->name('profile.update');

        Route::delete("/delete-account", [AuthController::class, "deleteAccount"])->name("profile.delete");

        Route::get(("/profile/kyc/get"), [AuthController::class, 'kycget']);
        Route::post(("/profile/kyc/create"), [AuthController::class, 'kyccreate']);
        Route::post(("/profile/kyc/update"), [AuthController::class, 'kycupdate']);

        // Orders Route Group 
        Route::prefix("orders")->name('orders')->group(function () {
            Route::get("/", [OrderController::class, 'index'])->name('index');
            Route::get("/pending", [OrderController::class, 'pending'])->name('pending');
            Route::get("/{id}/assigned", [OrderController::class, 'getForm'])->name('form');
            Route::get("/complete", [OrderController::class, 'complete'])->name('complete');

            Route::post("/submit-form", [OrderController::class, 'submit_form'])->name("submit");
            
            
            Route::post("/coupon", [OrderController::class, 'apply_coupon'])->name('coupon');
            
            Route::get('/{id}/checkout', [OrderController::class, 'checkout'])->name('checkout.service');
            Route::post('/checkout', [OrderController::class, 'store'])->name('store.payment');
            Route::post('/checkout/wallet', [OrderController::class, 'store_offline'])->name('store.wallet');
            
        });

        // Wallet Route Group 
        Route::prefix("wallet")->name('wallet')->group(function () {
            Route::get("/", [WalletController::class, 'index'])->name('index');
            Route::get("/show", [WalletController::class, 'show'])->name('show');
        });


        // Payment Route Group 
        Route::prefix("payments")->name('payments')->group(function () {
            Route::get("/", [PaymentController::class, 'index'])->name('index');
            Route::get("/{id}/show", [PaymentController::class, 'show'])->name('show');
        });
    });
});
