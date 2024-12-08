<?php

use App\Http\Controllers\ControlLedController;
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

Route::get('/led', function () {
    return view('led');
});

Route::get('/front', function () {
    return view('front');
});


Route::get('/control_led', [ControlLedController::class, 'index']);
Route::get('/led/{room}', [ControlLedController::class, 'getLedState']);
Route::post('/led/{room}', [ControlLedController::class, 'setLedState']);


