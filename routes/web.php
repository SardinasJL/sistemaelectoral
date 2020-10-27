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


//Obtiene los resultados de las votaciones
Route::get('/', "App\Http\Controllers\VotationController@getAll");

Route::group(["middleware" => "auth"], function () {

//Rutas para la tabla integrantes
    Route::get("integrantes", "App\Http\Controllers\IntegranteController@getAll");
    Route::get("integrantes/create", "App\Http\Controllers\IntegranteController@getCreate");
    Route::post("integrantes/create", "App\Http\Controllers\IntegranteController@postCreate");
    Route::get("integrantes/edit/{id}", "App\Http\Controllers\IntegranteController@getEdit");
    Route::post("integrantes/edit/{id}", "App\Http\Controllers\IntegranteController@postEdit");
    Route::get("integrantes/delete/{id}", "App\Http\Controllers\IntegranteController@Delete");

//Rutas para la tabla mesas
    Route::get("mesas", "App\Http\Controllers\MesaController@getAll");
    Route::get("mesas/create", "App\Http\Controllers\MesaController@getCreate");
    Route::post("mesas/create", "App\Http\Controllers\MesaController@postCreate");
    Route::get("mesas/edit/{id}", "App\Http\Controllers\MesaController@getEdit");
    Route::post("mesas/edit/{id}", "App\Http\Controllers\MesaController@postEdit");
    Route::get("mesas/delete/{id}", "App\Http\Controllers\MesaController@Delete");

//Rutas para la tabla actas
    Route::get("actas", "App\Http\Controllers\ActaController@getAll");
    Route::get("actas/create", "App\Http\Controllers\ActaController@getCreate");
    Route::post("actas/create", "App\Http\Controllers\ActaController@postCreate");
    Route::get("actas/edit/{id}", "App\Http\Controllers\ActaController@getEdit");
    Route::post("actas/edit/{id}", "App\Http\Controllers\ActaController@postEdit");
    Route::get("actas/delete/{id}", "App\Http\Controllers\ActaController@Delete");

    //Rutas para la tabla users
    Route::get("users", "App\\Http\\Controllers\\UserController@getAll");
    Route::get("users/create", "App\\Http\\Controllers\\UserController@getCreate");
    Route::post("users/create", "App\\Http\\Controllers\\UserController@postCreate");
    Route::get("users/{id}", "App\Http\Controllers\UserController@getEdit");
    Route::post("users/{id}", "App\Http\Controllers\UserController@postEdit");
    Route::get("users/delete/{id}", "App\Http\Controllers\UserController@delete");


});

//Tomar en cuenta que la ruta "logout" ya fue creada (automáticamente) al instalar jetstream
//Al igual que la ruta "register"



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
