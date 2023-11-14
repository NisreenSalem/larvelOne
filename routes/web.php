<?php

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
Route::get('About', function () {
    return "Welcome to About webpage";
});
Route::get('ContactUs', function () {
    return "Welcome to ContactUs webpage";
});


Route::prefix('support')->group(function () {
    Route::get('/', function () {
        return "Support  page";
    });
    Route::get('chat', function () {
        return " Chat Page";
    });
    Route::get('ticket', function () {
        return "Ticket page";
    });
});

Route::prefix('training')->group(function () {
    Route::get('/', function () {
        return "training  page";
    });
    Route::get('hr', function () {
        return " HR Page";
    });
    Route::get('ict', function () {
        return "ICT page";
    });
    Route::get('marketing', function () {
        return "Marktong page";
    });
    Route::get('logistics', function () {
        return "Logistics page";
    });
});
