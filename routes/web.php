<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::middleware(['isAuth'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name("login");
    Route::post('authenticate', [AuthController::class, 'authenticate']);
});


Route::get("/Chat", [ChatController::class, 'index'])->name('Chat');
Route::get("/save", [ChatController::class, 'save'])->name('save');

Route::get("/sign-up", [RegisterController::class, 'index'])->name('sign-up');
Route::post("/register", [RegisterController::class, 'store'])->name('register');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/Chat');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/email/verify', function () {
   
})->middleware('auth')->name('verification.notice');