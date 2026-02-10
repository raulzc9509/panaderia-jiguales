<?php

use App\Http\Controllers\UnderStockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryMovementController;

Route::middleware(['auth', 'role:ADMIN,EMPLEADO'])->group(function () {
    Route::get('/inventario', [InventoryMovementController::class, 'index'])->name('inventario.index');
    Route::get('/inventario/crear', [InventoryMovementController::class, 'create'])->name('inventario.create');
    Route::post('/inventario', [InventoryMovementController::class, 'store'])->name('inventario.store');
    Route::get('/bajo-stock', UnderStockController::class)->name('stock.bajo');

});



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

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:ADMIN'])->get('/solo-admin', function () {
    return "✅ Acceso OK: ADMIN";
});

Route::middleware(['auth', 'role:ADMIN,EMPLEADO'])->get('/inventario-demo', function () {
    return "✅ Acceso OK: ADMIN o EMPLEADO";
});

Route::middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::resource('productos', ProductController::class);
});

