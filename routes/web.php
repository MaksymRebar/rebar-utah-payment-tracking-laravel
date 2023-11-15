<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/transactions',[TransactionController::class,'index'])->name('transactions');
Route::get('/transactions/edit',function (){
    return view('transactions.edit');
})->name('transactions.edit');
Route::post('/transactions/save',[TransactionController::class,'save'])->name('transactions.save');
Route::get('/transactions/{id}',[TransactionController::class,'read'])->name('transactions.read');
Route::get('/transactions/{id}/add-payment',[PaymentController::class,'edit'])->name('payments.edit');

Route::get('/payments',[PaymentController::class,'index'])->name('payments');
Route::get('/payments/edit',function(){
    return view('payments.edit');
})->name('payments.edit');

require __DIR__.'/auth.php';
