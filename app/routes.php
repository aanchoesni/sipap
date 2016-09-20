<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

// Route::get('/', function () {
//     return View::make('hello');
// });
Route::get('/', 'FrontController@index');
Route::post('authenticate', 'HomeController@authenticate');
Route::get('logout', 'HomeController@logout');

Route::group(array('before' => 'auth'), function () {
    Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'HomeController@index'));
    Route::get('chard', array('as' => 'chard', 'uses' => 'HomeController@chard'));
    Route::group(array('prefix' => 'admin', 'before' => 'admin'), function () {
        Route::resource('jnskomoditis', 'JnskomoditisController');
        Route::resource('komoditis', 'KomoditisController');
        Route::resource('kattipas', 'KattipasController');
        Route::resource('tipas', 'TipasController');
        Route::post('provdata', array('as' => 'admin.provdata', 'uses' => 'TipasController@postDatakota'));
        Route::resource('transaksis', 'TransaksisController');
        Route::get('import', array('as' => 'admin.transaksis.import', 'uses' => 'TransaksisController@import'));
        Route::post('excelstore', array('as' => 'admin.excelstore', 'uses' => 'TransaksisController@excelstore'));
        Route::get('cari', array('as' => 'admin.transaksis.cari', 'uses' => 'TransaksisController@cari'));
        Route::get('cariuser', array('as' => 'admin.transaksis.cariuser', 'uses' => 'TransaksisController@cariuser'));
        Route::resource('pelayarans', 'PelayaransController');
        Route::resource('penerimas', 'PenerimasController');
        Route::resource('admins', 'AdminsController');
        Route::get('exportindex', array('as' => 'admin.exportindex', 'uses' => 'TransaksisController@exportindex'));
        Route::get('exporttransaksi', array('as' => 'admin.exporttransaksi', 'uses' => 'TransaksisController@export'));
    });
});
