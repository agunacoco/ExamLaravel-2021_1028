<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CommentsController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/cars/list', [CarsController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarsController::class, 'create'])->middleware(['auth'])->name('cars.create');
Route::post('/cars/store', [CarsController::class, 'store'])->name('cars.store');
Route::get('/cars/show/{id}', [CarsController::class, 'show'])->name('cars.show');
Route::get('/cars/edit/{id}', [CarsController::class, 'edit'])->name('cars.edit');
Route::delete('/cars/image/{id}', [CarsController::class, 'imageDelete'])->middleware(['auth'])->name('cars.imagedelete');
Route::patch('/cars/update/{id}', [CarsController::class, 'update'])->middleware(['auth'])->name('cars.update');
Route::delete('/cars/delete/{id}', [CarsController::class, 'destory'])->middleware(['auth'])->name('cars.destory');

Route::post('/comments/store/{car_id}',[ CommentsController::class, 'store' ])->middleware(['auth'])->name('comment.store');
Route::delete('/comments/destory/{comment_id}',[ CommentsController::class, 'destory' ])->middleware(['auth'])->name('comment.destory');
require __DIR__.'/auth.php';
