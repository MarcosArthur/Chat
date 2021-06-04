<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
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

Route::get('/', [AuthController::class, 'index'])->name("Login");
Route::post('authenticate', [AuthController::class, 'authenticate']);


Route::get("/Chat", [ChatController::class, 'index'])->name('Chat');
Route::get("/save", [ChatController::class, 'save'])->name('save');