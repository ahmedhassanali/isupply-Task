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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\productController::class, 'index'])->name('home');
// Route::post('/product/update/{product}',  [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
// Route::resource('product', App\Http\Controllers\ProductController::class, ['only'=> ['index','create','store','destroy','edit']]);
