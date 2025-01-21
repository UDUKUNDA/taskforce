<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AuthController;

// Account Routes
Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store');
Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
Route::get('/accounts/{id}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
Route::put('/accounts/{id}', [AccountController::class, 'update'])->name('accounts.update');
Route::delete('/accounts/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');



// Category Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Transaction Routes
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

// Budget Routes
Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');
Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');

// Notification Routes
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::post('/notifications/{notification}/mark-as-read', [NotificationController::class, 'markAsRead'])
    ->name('notifications.markAsRead');

Route::get('/', [AccountController::class, 'index'])->name('accounts.index');
//Auth Routes
Route::get('/login',[AuthController::class, 'login']);
Route::get('/signup',[AuthController::class, 'signup']);
Route::post('/registration_post', [AuthController::class, 'registration_post'])->name('registration_post');
Route::post('/login_post',[AuthController::class, 'login_post']);
Route::group(['middleware' => 'is_admin'], function(){
});
Route::group(['middleware' => 'is_user'], function(){
});
