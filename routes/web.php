<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;

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
// Route::get('/temp', function () {
//     return view('temp');
// });
Route::get('/login', function () {
    return view('login');
});
Route::post('recieve', function () {
    return 'Data Recived';
})->name('recieve');




Route::get('/form', [FormController::class, 'showForm'])->name('show.form');
Route::post('/form', [FormController::class, 'submitForm'])->name('submit.form');
Route::get('/thank-you', [FormController::class, 'thankYou'])->name('thank.you');


// Route::get('login', [ExampleController::class, 'login']);
// Route::post('recieve', [ExampleController::class, 'recieve'])->name('recieve');


// Route::get('addcar', [CarController::class, 'store']);
// Route::post('storeCar', [CarController::class, 'store'])->name('storeCar');
// Route::get('addcar', [CarController::class, 'create']);




Route::get('cars', [CarController::class, 'index']);
Route::get('editCar/{id}', [CarController::class, 'edit']);
Route::get('carDetails/{id}', [CarController::class, 'show'])->name('carDetails');
Route::get('deleteCar/{id}', [CarController::class, 'destroy'])->name('deleteCar');

Route::put('updateCar/{id}', [CarController::class, 'update'])->name('UpdateCar');

// Update the news
Route::get('addnews', [NewsController::class, 'create']);
Route::post('storeNews', [NewsController::class, 'store'])->name('storeNews');
// Showing the news and showing news data in updated/edit form
Route::get('news', [NewsController::class, 'index']);
Route::get('editNews/{id}', [NewsController::class, 'edit']);
Route::get('newsDetails/{id}', [NewsController::class, 'show'])->name('newsDetails');
Route::get('deleteNews/{id}', [NewsController::class, 'destroy'])->name('deleteNews');


Route::put('updateNews/{id}', [NewsController::class, 'update'])->name('updateNews');
