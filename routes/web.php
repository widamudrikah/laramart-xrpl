<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(FrontendController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/collections', 'categories')->name('categories');
    Route::get('/collections/{category_slug}', 'products')->name('products-category');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    // dashboard
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index');
    });

    // category
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category', 'index')->name('category');
        Route::get('/category/create', 'create')->name('category-create');
        Route::post('/category/store', 'store')->name('category-store');
        Route::get('/category/edit/{id}', 'edit')->name('category-edit');
        Route::put('/category/update/{id}', 'update')->name('category-update');
    });

    // brands
    Route::get('/brands', App\Livewire\Admin\Brand\Index::class)->name('brands');

    // Products
    Route::controller(ProductController::class)->group(function(){
        Route::get('/products', 'index')->name('products-index');
        Route::get('/products/create', 'create')->name('products-create');
        Route::post('/products/store', 'store')->name('products-store');
        Route::get('/products/edit/{id}', 'edit')->name('products-edit');
        Route::put('/products/update/{id}', 'update')->name('products-update');
        Route::get('/products/delete/{id}', 'delete')->name('products-delete');

        // untuk hapus gambar satu persatu
        Route::get('/products/delete-image/{id}', 'deleteImage')->name('products-delete-image');

        // AJAX
        Route::post('/product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('/product-color/{prod_color_id}/delete', 'deleteProdColorQty');
    });

    //colors
    Route::controller(ColorController::class)->group(function(){
        Route::get('/colors', 'index')->name('colors-index');
        Route::get('/colors/create', 'create')->name('colors-create');
        Route::post('/colors/store', 'store')->name('colors-store');
        Route::get('/colors/edit/{id}','edit')->name('colors-edit');
        Route::put('/colors/update/{id}','update')->name('colors-update');
        Route::get('/colors/delete/{id}','delete')->name('colors-delete');

    });

    Route::controller(SliderController::class)->group(function(){
        Route::get('/slider', 'index')->name('slider-index');
        Route::get('/slider/create', 'create')->name('slider-create');
        Route::post('/slider/store', 'store')->name('slider-store');
        Route::get('/slider/edit/{slider}', 'edit')->name('slider-edit');
        Route::put('/slider/update/{slider}', 'update')->name('slider-update');
        Route::get('/slider/delete/{slider}', 'delete')->name('slider-delete');
    });
    
});



// User Routes