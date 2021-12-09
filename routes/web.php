<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('front.pages.index');
})->name('anasayfa');

/*
 * Auth İşlemleri
 */
Route::get('/giris', [LoginController::class, 'login'])->name('giris');
Route::post('/giris', [LoginController::class, 'login_post'])->name('giris_post');
Route::get('/giris-sms/{twoFactor}', [LoginController::class, 'login_sms'])->name('girisSms');
Route::post('/giris-sms', [LoginController::class, 'login_sms_post'])->name('girisSms_post');

Route::get('/sifremi-unuttum', [LoginController::class, 'sifremi_unuttum'])->name('sifremi_unuttum');
Route::get('/cikis', [LoginController::class, 'logout'])->name('cikis');


Route::prefix('panel')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('panel');
});
