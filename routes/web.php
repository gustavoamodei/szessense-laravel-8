<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrascoController;
use App\Http\Controllers\AcessorioController;
use App\Http\Controllers\ClienteController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('frasco', FrascoController::class);
Route::resource('acessorio', AcessorioController::class);
Route::resource('cliente', ClienteController::class);

require __DIR__.'/auth.php';
