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


Route::post('storeNews', [NewsController::class, 'store'])->name('storeNews');

Route::get('addnews', [NewsController::class, 'create']);
