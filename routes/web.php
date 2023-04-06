<?php

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PaySalaryController;
use App\Http\Controllers\Dashboard\AttendenceController;
use App\Http\Controllers\Dashboard\AdvanceSalaryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pos', function () {
    $row = (int) request('row', 10);

    if ($row < 1 || $row > 100) {
        abort(400, 'The per_page parameter must be an integer between 1 and 100.');
    }

    return view('pos.index', [
        'user' => auth()->user(),
        'customers' => Customer::all()->sortBy('name'),
        'products' => Product::filter(request(['search']))
            ->sortable()
            ->paginate($row)
            ->appends(request()->query()),
    ]);
})->name('pos');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::resource('/customers', CustomerController::class);
    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/employees', EmployeeController::class);
    Route::resource('/advance-salary', AdvanceSalaryController::class)->except(['show']);

    // PaySalary
    Route::resource('/pay-salary', PaySalaryController::class)->except(['show', 'create', 'edit', 'update']);
    Route::get('/pay-salary/history', [PaySalaryController::class, 'payHistory'])->name('pay-salary.payHistory');
    Route::get('/pay-salary/history/{id}', [PaySalaryController::class, 'payHistoryDetail'])->name('pay-salary.payHistoryDetail');
    Route::get('/pay-salary/{id}', [PaySalaryController::class, 'paySalary'])->name('pay-salary.paySalary');

    // Employee Attendence
    Route::resource('/employee/attendence', AttendenceController::class)->except(['show', 'update', 'destroy']);

    // Category Product
    Route::get('/products/import', [ProductController::class, 'importView'])->name('products.importView');
    Route::post('/products/import', [ProductController::class, 'importStore'])->name('products.importStore');
    Route::get('/products/export', [ProductController::class, 'exportData'])->name('products.exportData');
    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
});

require __DIR__.'/auth.php';
