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


// flats Route
Route::resource('flats', 'FlatController');
Route::post('flats/create', 'FlatController@store')->name('flats.store');


// receivables Route
Route::resource('receivables', 'ReceivableController');
Route::post('receivables/create', 'ReceivableController@store')->name('receivables.store');


// outgoings Route
Route::resource('outgoings', 'OutgoingsController');
Route::post('outgoings/create', 'OutgoingsController@store')->name('outgoings.store');


// flatsreceivables Route
Route::resource('flatsreceivables', 'FlatReceivablesController');
Route::post('flatsreceivables/create', 'FlatReceivablesController@store')->name('flatsreceivables.store');

//Expensereport
Route::resource('expensereport', 'ExpensereportController');


//report
Route::resource('reports', 'ReportsController');

// Route::post('getFlatReceivables', 'FlatController@getFlatReceivables')->name('getFlatReceivables');
//Route::post('/flatsreceivables/get', 'FlatReceivablesController@getFlatReceivables');


// flatpaid Route
Route::resource('flatpaid', 'FlatpaidController');
Route::post('flatpaid/create', 'FlatpaidController@store')->name('flatpaid.store');
