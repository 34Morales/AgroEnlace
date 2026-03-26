<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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
     // Productos
    Route::resource('products', ProductController::class);

    // Pedidos
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    //Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::delete('/admin/product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteProduct');

    Route::delete('/admin/user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::get('/admin', function () {
    if (auth()->user()->role !== 'admin') {
        abort(403);
    }
    return app(\App\Http\Controllers\AdminController::class)->index();
});

//Cliente
  Route::get('/client', [ClientController::class, 'index'])->name('client.dashboard');

    Route::get('/my-orders', [ClientController::class, 'orders'])->name('client.orders');

    Route::post('/buy', [ClientController::class, 'buy'])->name('client.buy');

});

require __DIR__.'/auth.php';
