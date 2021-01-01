<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ManagersController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\BillsController;
use App\Http\Controllers\Dashboard\CustomersController;
use App\Http\Controllers\Dashboard\InvoicesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/dashboard');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(
    [ 'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function() {

        Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function () {
            // Index Page
            Route::get('/', [DashboardController::class, 'index'])->name('index');
            Route::post('/', [DashboardController::class, 'live_data'])->name('index.live');

            // Managers Routes
            Route::resource('managers', ManagersController::class);

            // Categories Routes
            Route::resource('categories', CategoriesController::class);

            // Products Routes
            Route::resource('products', ProductsController::class)->except('show');

            // Sales Routes
            Route::prefix('sales')->name('sales.')->group(function (){

                // Customers page
                Route::resource('customers', CustomersController::class);
                // Invoices page
                Route::resource('invoices', InvoicesController::class);

            });

            // Purchases Routes
            Route::prefix('purchases')->name('purchases.')->group(function (){

                // Bills Routes
                Route::resource('bills', BillsController::class);

            });


            // Profile Routes
            Route::prefix('settings')->name('settings.')->group(function (){

                // Profile info page
                Route::get('/account', [ ProfileController::class, 'account' ])->name('account');
                // Profile password change page
                Route::get('change_password', [ ProfileController::class, 'changePassword' ])->name('change_password');

            });

        });

        Auth::routes([
            'register' => false,
            'reset' => false
        ]);

        Route::fallback(function () {
            abort(404);
        });

});
