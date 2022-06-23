<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.index');
    })->name('dashboard');
});

Auth::routes(['register' => false, 'reset' => false]);

//dashboard routes
Route::get('/add-product', [App\Http\Controllers\HomeController::class, 'addProduct'])->name('add-product');
Route::get('/all-products', [App\Http\Controllers\HomeController::class, 'allProducts'])->name('all-products');
Route::post('/store-product', [App\Http\Controllers\HomeController::class, 'storeProduct'])->name('store-product');
Route::get('product/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteProduct']);
Route::get('product/edit/{id}', [App\Http\Controllers\HomeController::class, 'editProduct']);
Route::post('store-edit-product/{id}', [App\Http\Controllers\HomeController::class, 'storeEditProduct']);
