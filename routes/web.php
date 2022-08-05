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
Route::get('/', [App\Http\Controllers\Admin\CategoriaController::class, 'welcomeIndex']);

Route::group(['prefix' => 'admin'], function () {
    Route::resource('productos', App\Http\Controllers\Admin\ProductoController::class, ["as" => 'admin']);    
});

//Ayuda
Route::get('/contacto', [App\Http\Controllers\AyudaController::class, 'index']);
Route::post('contacto/enviar_mail', [App\Http\Controllers\AyudaController::class, 'enviar_mail']);
Route::get('/enviado', [App\Http\Controllers\AyudaController::class, 'mensaje_enviado']);

//Menu
Route::get('/categoria/{id}', [App\Http\Controllers\admin\CategoriaController::class, 'ver_productos']);
Route::get('/mas_vendidos', [App\Http\Controllers\admin\ProductoController::class, 'ver_mas_vendidos']);
Route::get('/al_azar', [App\Http\Controllers\admin\ProductoController::class, 'al_azar']);
Route::get('/ofertas', [App\Http\Controllers\admin\ProductoController::class, 'oferta']);

//Productos
Route::get('/producto/{id}', [App\Http\Controllers\admin\ProductoController::class, 'ver_individual']);



Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', App\Http\Controllers\Admin\roleController::class, ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('usuarios', App\Http\Controllers\Admin\UsuarioController::class, ["as" => 'admin']);
});
