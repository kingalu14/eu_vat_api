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

Route::group(['middleware' => ['auth']], function () {
Route::get('/', 'HomeController@index')->name('home');

Route::post('/vat-validation', [
    'uses' => 'Consumer\VatValidationContoller@validateVat',
])->name('vat-validation');

Route::get('/vat-validation', [
    'uses' => 'Consumer\VatValidationContoller@index',
])->name('vat-validation');

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
