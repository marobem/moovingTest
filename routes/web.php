<?php

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

//Route::post('/contas', 'ContasControlller@cadastrarConta');

Route::post('/contas', 'ContasControlller@store');
Route::patch('/contas/{conta}', 'ContasControlller@update');
Route::delete('/contas/{conta}', 'ContasControlller@destroy');
