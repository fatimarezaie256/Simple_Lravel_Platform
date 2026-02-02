<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('/',[ProductController::class,'index']);
Route::prefix('/customer')->controller(CustomerController::class)->group(function(){
      Route::get('/','index');
      Route::post('/create','create');
      Route::view('/insert','customer.insert');
});
Route::post('cart/add/{id}/{price}',[CartController::class,'add']);
Route::prefix('/products')->controller(ProductController::class)->group(function (){
    Route::get('/','index');
    Route::post('insert','insert');
    Route::view('/add','product.add');
});
require __DIR__.'/auth.php';
