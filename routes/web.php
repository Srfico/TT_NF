<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HomeController;

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
/*Home */
Route::get('/','App\Http\Controllers\HomeController@__invoke')->name('welcome');
Route::get('/','App\Http\Controllers\HomeController@Ingreso')->name('homeCalculo');
Route::get('/LS','App\Http\Controllers\LSController@__invoke');
Route::get('/SA','App\Http\Controllers\SAController@__invoke');
Route::get('/GA','App\Http\Controllers\GAController@__invoke');
Route::get('/Comparativa','App\Http\Controllers\ComparativaController@__invoke');
Route::get('/AppLs','App\Http\Controllers\applsController@__invoke');
Route::post('/AppLs','App\Http\Controllers\applsController@SaveLs')->name('SaveLs');
Route::get('/AppSa','App\Http\Controllers\appsaController@__invoke');
Route::post('/AppSa','App\Http\Controllers\appsaController@SaveSa')->name('SaveSa');
Route::get('/AppGa','App\Http\Controllers\appgaController@__invoke');
Route::post('/AppGa','App\Http\Controllers\appgaController@SaveGa')->name('SaveGa');
Route::get('/Info','App\Http\Controllers\InfoController@__invoke');