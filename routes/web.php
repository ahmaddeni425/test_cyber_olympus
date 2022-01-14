<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Frontend;

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

Route::get('/', [Frontend\OrderController::class, 'index'])->name('frontend.order.index');
Route::get('/order', [Frontend\OrderController::class, 'index'])->name('frontend.order.index');
Route::get('/order/{id}/detail', [Frontend\OrderController::class, 'detail'])->name('frontend.order.detail');
Route::get('/product', [Frontend\ProductController::class, 'index'])->name('frontend.product.index');
Route::get('/customer', [Frontend\CustomerController::class, 'index'])->name('frontend.customer.index');
Route::get('/agent', [Frontend\AgentController::class, 'index'])->name('frontend.agent.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/customers', [Backend\CustomerController::class, 'index'])->middleware(['auth'])->name('backend.customers.index');
Route::get('/dashboard/customers/create', [Backend\CustomerController::class, 'create'])->middleware(['auth'])->name('backend.customers.create');
Route::post('/dashboard/customers/store', [Backend\CustomerController::class, 'store'])->middleware(['auth'])->name('backend.customers.store');
Route::get('/dashboard/customers/{id}/edit', [Backend\CustomerController::class, 'edit'])->middleware(['auth'])->name('backend.customers.edit');
Route::get('/dashboard/customers/{id}/detail', [Backend\CustomerController::class, 'detail'])->middleware(['auth'])->name('backend.customers.detail');
Route::put('/dashboard/customers/{id}/update', [Backend\CustomerController::class, 'update'])->middleware(['auth'])->name('backend.customers.update');
Route::delete('/dashboard/customers/{id}/delete', [Backend\CustomerController::class, 'destroy'])->middleware(['auth'])->name('backend.customers.destroy');

Route::get('/dashboard/author', function () {
    return view('backend.author.index');
})->middleware(['auth'])->name('backend.author.index');

require __DIR__.'/auth.php';
