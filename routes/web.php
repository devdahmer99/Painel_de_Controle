<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::prefix('painel')->group(function() {

    Route::get('/', [HomeController::class, 'index'])->name('admin');

    Route::get('login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'register'])->name('admin.register');

    Route::post('logout', [LoginController::class, 'logout']);
});

Auth::routes();

