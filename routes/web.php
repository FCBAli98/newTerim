<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/first_step', [\App\Http\Controllers\RegisterController::class, 'index']);
Route::get('register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register.index');
Route::post('first_step', [\App\Http\Controllers\RegisterController::class, 'firstStep'])->name('first_step.form');
Route::post('second_step', [\App\Http\Controllers\RegisterController::class, 'SecondStep'])->name('second_step.form');
Route::get('/detail_info', [\App\Http\Controllers\RegisterController::class , 'actionDetail'])->name('detail_info');
