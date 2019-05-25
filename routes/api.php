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

// Route Client :

Route::post('client', 'ClientController@createClient');
Route::put('client/{id}','ClientController@updateClient');
Route::delete('client/{id}','ClientController@deleteClient');
Route::get('clients','ClientController@index');
Route::get('client/{name}','ClientController@findClient');

// Route Commande :

Route::post('commands', 'CommandeController@createCommande');
Route::put('command/{id}','CommandeController@updateCommande');
Route::delete('command/{id}','CommandeController@deleteCommande');
Route::get('commands','CommandeController@index');
Route::get('commands','CommandeController@generatePDF');
Route::post('commands','CommandeController@attachmentEMAIL');
Route::post('commands','CommandeController@createFacture');

// Route Facture :

Route::post('factures','FactureController@createFacture');
Route::put('facture/{id}','FactureController@updateFacture');
Route::delete('facture/{id}','FactureController@deleteFacture');
Route::get('factures','FactureController@index');
Route::get('facture','FactureController@generatePDF');
Route::post('factures','FactureController@attachmentEMAIL');
Route::post('facture','FactureController@createNoteCredit');

// Route Devis :

Route::post('quotations','DevisController@createDevis');
Route::put('quotation/{id}','DevisController@updateDevis');
Route::delete('quotation/{id}','DevisController@deleteDevis');
Route::get('quotations','DevisController@index');
Route::get('quotation','DevisController@generatePDF');
Route::post('quotation','DevisController@createCommande');
