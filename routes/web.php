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

//Route::get('/', function () {
//Route::apiResource('posts', 'API\ClientController');

// Route ClientController


// Route CommandeController

Route::post('commands', 'CommandeController@createCommande');
Route::put('commands/{id}','CommandeController@updateCommande');
Route::delete('commands/{id}','CommandeController@deleteCommande');
Route::get('commands','CommandeController@index');
Route::get('commands','CommandeController@generatePDF');
Route::post('commands','CommandeController@attachmentEMAIL');
Route::post('commands','CommandeController@createFacture');

// Route DevisController

Route::post('quotations', 'DevisController@createDevis');
Route::put('quotations/{id}','DevisController@updateDevis');
Route::delete('quotations/{id}','DevisController@deleteDevis');
Route::get('quotations','DevisController@index');
Route::get('quotations','DevisController@generatePDF');
Route::post('quotations','DevisController@attachmentEMAIL');
Route::post('quotations','DevisController@createFacture');

// Route DesignationCommandeController

Route::post('designation_commands','DesignationCommandeController@createDesignationCommande');
Route::delete('designation_commands/{id}','DesignationCommandeController@deleteDesignationCommande');

// Route DesignationCommandeController

Route::post('designations','DesignationDevisController@createDesignationDevis');
Route::delete('designations/{id}','DesignationDevisController@deleteDesignationDevis');
//});
