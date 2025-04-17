<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MasterController;
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

Route::get('/', [Controller::class, 'home'])->name('home');

Route::get('/create', [ReviewController::class, 'create'])->name('createReview');

Route::post('/createReviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/master/{master_id}', [Controller::class, 'master'])->name('master.info'); // Получаем информацию о мастере

Route::get('/service/{id}', [OrderController::class, 'index'])->name('serviceInformation');
Route::post('/createOrder/{id}', [OrderController::class, 'createOrder'])->name('createOrder');
Route::get('/getAvailableTimes/{masterId}/{date}', [OrderController::class, 'getAvailableTimes'])->name('getAvailableTimes');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('authenticate');

});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/adminPanel', [AuthController::class, 'showAdminPanel'])->name('adminPanel');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');


    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index'); // Список отзывов
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit'); // Форма редактирования отзыва
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update'); // Обновление отзыва
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy'); // Удаление отзыва



    Route::get('/masters', [MasterController::class, 'index'])->name('masters.index');
    Route::get('/masters/create', [MasterController::class, 'create'])->name('masters.create');
    Route::post('/masters', [MasterController::class, 'store'])->name('masters.store');
    Route::get('/masters/{master_id}/edit', [MasterController::class, 'edit'])->name('masters.edit');
    Route::put('/masters/{master_id}', [MasterController::class, 'update'])->name('masters.update');
    Route::delete('/masters/{master_id}', [MasterController::class, 'destroy'])->name('masters.destroy');
    Route::post('/masters/{master_id}/attach-service', [MasterController::class, 'attachService'])->name('masters.attachService');
    Route::delete('/masters/{master_id}/detach-service/{service_id}', [MasterController::class, 'detachService'])->name('masters.detachService');

    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('orders.index');
Route::get('/orders/{id}/edit', [OrderController::class, 'adminEdit'])->name('orders.edit');
Route::put('/orders/{id}', [OrderController::class, 'adminUpdate'])->name('orders.update');
Route::delete('/orders/{id}', [OrderController::class, 'adminDestroy'])->name('orders.destroy');
});


