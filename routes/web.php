<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {

    /*
    |--------------------------------------------------------------------------
    | Public Pages
    |--------------------------------------------------------------------------
    */
    Route::get('/', function () {
        $featuredProducts = \App\Models\Product::with('category')
            ->latest()
            ->get();

        return view('welcome', compact('featuredProducts'));
    })->name('welcome');

    Route::get('/about', fn () => view('about'))->name('about');
    Route::get('/services', fn () => view('services'))->name('services');
    Route::get('/pricing', fn () => view('pricing'))->name('pricing');
    Route::get('/contact', fn () => view('contact'))->name('contact');

    /*
    |--------------------------------------------------------------------------
    | Cars / Front Products
    |--------------------------------------------------------------------------
    */
    Route::get('/cars', function () {
        $products = \App\Models\Product::with([
            'category',
            'location',
            'comments'
        ])->latest()->get();

        return view('cars', compact('products'));
    })->name('cars');

    Route::get('/cars/{product}', [ProductController::class, 'showFront'])
        ->name('cars.show');

    /*
    |--------------------------------------------------------------------------
    | Checkout & Booking
    |--------------------------------------------------------------------------
    */
    Route::get('/checkout/{product}', [OrderController::class, 'checkout'])
        ->name('orders.checkout');

    Route::post('/checkout/{product}', [OrderController::class, 'store'])
        ->name('orders.store');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'checkadmin'])->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');

        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */
        Route::resource('users', UserController::class);

        Route::get('/users/make-admin/{id}', [UserController::class, 'makeAdmin'])
            ->name('users.makeAdmin');

        Route::get('/users/disable/{id}', [UserController::class, 'disable'])
            ->name('users.disable');

        Route::get('/users/activate/{id}', [UserController::class, 'activate'])
            ->name('users.activate');

        Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */
        Route::resource('categories', CategoryController::class);

        /*
        |--------------------------------------------------------------------------
        | Locations
        |--------------------------------------------------------------------------
        */
        Route::resource('locations', LocationController::class)->except(['show']);

        /*
        |--------------------------------------------------------------------------
        | Products / Cars
        |--------------------------------------------------------------------------
        */
        Route::resource('products', ProductController::class);

        Route::delete('/products/gallery-image/{id}', [ProductController::class, 'deleteGalleryImage'])
            ->name('products.gallery.delete');

        /*
        |--------------------------------------------------------------------------
        | Orders
        |--------------------------------------------------------------------------
        */
        Route::get('/orders', [OrderController::class, 'index'])
            ->name('orders.index');

        Route::get('/orders/{order}', [OrderController::class, 'show'])
            ->name('orders.show');

        Route::post('/orders/{order}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

        Route::get('/orders/filter', [OrderController::class, 'filter'])
            ->name('orders.filter');

        Route::get('/orders/export/pdf', [OrderController::class, 'exportPdf'])
            ->name('orders.export.pdf');

        Route::get('/orders/export/excel', [OrderController::class, 'exportExcel'])
            ->name('orders.export.excel');

        Route::get('/orders/notification/{id}', [OrderController::class, 'notificationRedirect'])
            ->name('orders.notifications.redirect');

        /*
        |--------------------------------------------------------------------------
        | Payments
        |--------------------------------------------------------------------------
        */
        Route::get('/payments', [PaymentController::class, 'index'])
            ->name('payments.index');

        Route::get('/payments/{payment}', [PaymentController::class, 'show'])
            ->name('payments.show');

        Route::post('/payments/{payment}/status', [PaymentController::class, 'updateStatus'])
            ->name('payments.updateStatus');

        /*
        |--------------------------------------------------------------------------
        | Admin Comments
        |--------------------------------------------------------------------------
        */
        Route::get('/comments', [CommentController::class, 'index'])
            ->name('comments.index');

        Route::delete('/comments/{id}', [CommentController::class, 'destroy'])
            ->name('comments.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Authenticated Users
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth'])->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Reservations
        |--------------------------------------------------------------------------
        */
        Route::get('/my-reservations', [OrderController::class, 'myReservations'])
            ->name('orders.myReservations');

        Route::delete('/my-reservations/{order}', [OrderController::class, 'cancelReservation'])
            ->name('orders.cancelReservation');

        /*
        |--------------------------------------------------------------------------
        | Profile
        |--------------------------------------------------------------------------
        */
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Favorites
        |--------------------------------------------------------------------------
        */
        Route::get('/favorites', [FavoriteController::class, 'index'])
            ->name('favorites.index');

        Route::post('/favorites/toggle/{product}', [FavoriteController::class, 'toggle'])
            ->name('favorites.toggle');

        /*
        |--------------------------------------------------------------------------
        | User Comments
        |--------------------------------------------------------------------------
        */
        Route::post('/cars/{product}/comment', [CommentController::class, 'store'])
            ->name('cars.comment');
    });

    Auth::routes();
});
