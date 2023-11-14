<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;

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


Route::get('/', [LabController::class, 'index']);
Route::post('/', [LabController::class, 'store']);