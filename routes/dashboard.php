<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'],
    'as' => 'dashboard.',
    'prefix' => 'dashboard',
    //'namespace' => 'App\Http\Controllers\Dashboard',
], function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    

    // Route::get('/categories/{category}', [CategoriesController::class, 'show'])
    //     ->name('categories.show')
    //     ->where('category', '\d+');

    Route::get('/categories/trash', [CategoriesController::class, 'trash'])
        ->name('categories.trash');
    Route::put('categories/{category}/restore', [CategoriesController::class, 'restore'])
        ->name('categories.restore');
    Route::delete('categories/{category}/force-delete', [CategoriesController::class, 'forceDelete'])
        ->name('categories.force-delete');
    
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/products', ProductsController::class);
});

// Route::middleware('auth')->as('dashboard.')->prefix('dashboard')->group(function() {

// });


