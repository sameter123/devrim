<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/panel', [HomeController::class, 'index']);


Route::get('/', function () {
    return view('front.pages.index');
});
Route::get('/giris', function () {
    return view('back.auth.forgot-password');
});

?>



