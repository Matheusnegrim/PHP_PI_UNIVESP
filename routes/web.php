<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulaControllerController;

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


Route::resource('/aulas', \App\Http\Controllers\AulaController::class);
Route::post('relatorios', [\App\Http\Controllers\AulaController::class, 'search']);
