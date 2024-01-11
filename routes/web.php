<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\loginController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\signupController;


Route::get('singup-create',[signupController::class,'create'])->name('singup-create');
Route::any('singup-store',[signupController::class,'store'])->name('singup-store');


Route::get('login-index',[loginController::class,'index'])->name('login-index');
Route::get('login-create',[loginController::class,'create'])->name('login-create');
Route::post('login-store',[loginController::class,'store'])->name('login-store');
Route::get('login-show/{id}',[loginController::class,'show'])->name('login-show');
Route::get('login-edit/{id}',[loginController::class,'edit'])->name('login-edit');
Route::put('login-update/{id}', [loginController::class,'update'])->name('login-update');
Route::any('login-destroy/{id}',[loginController::class,'destory'])->name('login-destory');
// Stock route Start here  //
Route::get('stock.index',[StockController::class, 'index'])->name('stock.index');
Route::get('stock.create',[StockController::class,'create'])->name('stock.create');
Route::post('stock.store',[StockController::class,'store'])->name('stock.store');
Route::get('stock.show/{id}',[StockController::class,'show'])->name('stock.show');
Route::get('stock.edit/{id}',[StockController::class,'edit'])->name('stock.edit');
Route::put('stock.update/{id}',[StockController::class,'update'])->name('stock.update');
Route::any('stock.destroy/{id}',[StockController::class,'destroy'])->name('stock.destory');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
