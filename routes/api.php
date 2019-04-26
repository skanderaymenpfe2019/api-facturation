<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('clients', 'ClientController@createClient');
Route::put('client/{id}','ClientController@updateClient');
Route::delete('client/{id}','ClientController@deleteClient');
Route::get('clients','ClientController@index');

Route::post('commands', 'CommandeController@createCommande');
Route::put('command/{id}','CommandeController@updateCommande');
Route::delete('command/{id}','CommandeController@deleteCommande');
Route::get('commands','CommandeController@index');
Route::get('commands','CommandeController@generatePDF');
Route::post('commands','CommandeController@attachmentEMAIL');
Route::post('commands','CommandeController@createFacture');
