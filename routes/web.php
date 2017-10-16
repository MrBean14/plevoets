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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.home');
Route::get('/statistieken', 'DashboardController@statistieken')->name('dashboard.statistieken');

Route::get('/cars', 'CarsController@index')->name('cars.home');
Route::get('/cars/create', 'CarsController@create')->name('cars.create');
Route::post('/cars/create', 'CarsController@store')->name('cars.store');

Route::get('/cars/{id}/edit', 'CarsController@edit')->name('cars.edit');
Route::post('/cars/{id}/edit', 'CarsController@update')->name('cars.update');

Route::get('/cars/{id}/delete', 'CarsController@destroy')->name('cars.destroy');

Route::get('/acties', 'ActiesController@index')->name('acties.home');
Route::get('/acties/create', 'ActiesController@create')->name('acties.create');
Route::post('/acties/create', 'ActiesController@store')->name('acties.store');

Route::get('/acties/{id}/edit', 'ActiesController@edit')->name('acties.edit');
Route::post('/acties/{id}/edit', 'ActiesController@update')->name('acties.update');

Route::get('/acties/{id}/delete', 'ActiesController@destroy')->name('acties.destroy');

Route::get('/maatschappijen', 'MaatschappijenController@index')->name('maatschappijen.home');
Route::get('/maatschappijen/create', 'MaatschappijenController@create')->name('maatschappijen.create');
Route::post('/maatschappijen/create', 'MaatschappijenController@store')->name('maatschappijen.store');

Route::get('/maatschappijen/{id}/edit', 'MaatschappijenController@edit')->name('maatschappijen.edit');
Route::post('/maatschappijen/{id}/edit', 'MaatschappijenController@update')->name('maatschappijen.update');

Route::get('/maatschappijen/{id}/delete', 'MaatschappijenController@destroy')->name('maatschappijen.destroy');

Route::get('/makelaars', 'MakelaarsController@index')->name('makelaars.home');
Route::get('/makelaars/create', 'MakelaarsController@create')->name('makelaars.create');
Route::post('/makelaars/create', 'MakelaarsController@store')->name('makelaars.store');

Route::get('/makelaars/{id}/edit', 'MakelaarsController@edit')->name('makelaars.edit');
Route::post('/makelaars/{id}/edit', 'MakelaarsController@update')->name('makelaars.update');

Route::get('/makelaars/{id}/delete', 'MakelaarsController@destroy')->name('makelaars.destroy');

Route::get('/vervaldagtypes', 'VervaldagTypesController@index')->name('vervaldagtypes.home');
Route::get('/vervaldagtypes/create', 'VervaldagTypesController@create')->name('vervaldagtypes.create');
Route::post('/vervaldagtypes/create', 'VervaldagTypesController@store')->name('vervaldagtypes.store');

Route::get('/vervaldagtypes/{id}/edit', 'VervaldagTypesController@edit')->name('vervaldagtypes.edit');
Route::post('/vervaldagtypes/{id}/edit', 'VervaldagTypesController@update')->name('vervaldagtypes.update');

Route::get('/vervaldagtypes/{id}/delete', 'VervaldagTypesController@destroy')->name('vervaldagtypes.destroy');

Route::get('/klanten', 'KlantenController@index')->name('klanten.home');
Route::get('/klanten/create', 'KlantenController@create')->name('klanten.create');
Route::post('/klanten/create', 'KlantenController@store')->name('klanten.store');

Route::get('/klanten/{id}/edit', 'KlantenController@edit')->name('klanten.edit');
Route::post('/klanten/{id}/edit', 'KlantenController@update')->name('klanten.update');

Route::get('/klanten/{id}/delete', 'KlantenController@destroy')->name('klanten.destroy');

Route::post('/search/executeSearch', 'SearchController@executeSearch')->name('klanten.search');
Route::post('/search/executeFacturenSearch', 'SearchController@executeFacturenSearch')->name('facturen.search');
Route::post('/search/searchInvoices', 'SearchController@executeSearchInvoices')->name('facturen.search2');
Route::post('/search/statistieken', 'SearchController@berekenStatistieken')->name('dashboard.berekenen');

Route::get('/facturen', 'FacturenController@index')->name('facturen.home');
Route::get('/facturen/create', 'FacturenController@create')->name('facturen.create');
Route::post('/facturen/create', 'FacturenController@store')->name('facturen.store');

Route::get('/facturen/{id}/edit', 'FacturenController@edit')->name('facturen.edit');
Route::post('/facturen/{id}/edit', 'FacturenController@update')->name('facturen.update');

Route::get('/facturen/zoeken', 'FacturenController@search')->name('facturen.zoeken');

Route::get('/export', 'ExportController@index')->name('export.home');
Route::get('/export/export', 'ExportController@export')->name('export.export');