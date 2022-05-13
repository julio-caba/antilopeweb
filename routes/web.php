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

App::setLocale('es');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ayuda', function () {
    return view('admin/ayuda/ayuda');
});

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */
Route::group(['middleware' => 'admin'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('categorias', App\Http\Controllers\Admin\CategoriaController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('productos', App\Http\Controllers\Admin\ProductoController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', App\Http\Controllers\Admin\roleController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('usuarios', App\Http\Controllers\Admin\UsuarioController::class, ["as" => 'admin']);
});
