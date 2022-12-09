<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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
Route::get('/', [HomeController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('/show_order', [HomeController::class, 'show_order']);
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);



Route::resource('/admin/category', AdminController::class)->except('create', 'show', 'edit')->middleware('auth');
Route::resource('/admin/product', ProductController::class)->middleware('auth');


Route::resource('/admin/order', OrderController::class)->middleware('auth');

Route::get('/print_pdf/{id}', [HomeController::class, 'print_pdf']);
Route::get('/send_email/{id}', [HomeController::class, 'send_email']);

Route::post('/send_user_email/{id}', [HomeController::class, 'send_user_email']);

Route::get('/search', [HomeController::class, 'searchdata']);

Route::get('/product_search', [HomeController::class, 'product_search']);


// Route::get('/admin/product/checkSlug', [ProductController::class, 'checkSlug'])->middleware('auth');

Route::post('/add_comment', [HomeController::class, 'add_comment']);
Route::get('/delete_comment/{id}', [HomeController::class, 'delete_comment']);
Route::get('/delete_reply/{id}', [HomeController::class, 'delete_reply']);
Route::post('/add_reply', [HomeController::class, 'add_reply']);
