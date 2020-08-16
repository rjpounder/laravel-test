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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('contacts', 'ContactsController@index')->name('contacts');
    Route::get('contacts/create', 'ContactsController@create')->name('contacts.create');
    Route::post('contacts/create', 'ContactsController@store')->name('contacts.store');
    Route::get('contacts/{contact}/edit', 'ContactsController@edit')->name('contacts.edit');
    Route::post('contacts/{contact}/update', 'ContactsController@update')->name('contacts.update');

    Route::get('companies', 'CompaniesController@index')->name('companies');
    Route::get('companies/create', 'CompaniesController@create')->name('companies.create');
    Route::post('companies/create', 'CompaniesController@store')->name('companies.store');
    Route::get('companies/{company}/edit', 'CompaniesController@edit')->name('companies.edit');
    Route::post('companies/{company}/update', 'CompaniesController@update')->name('companies.update');

    Route::get('addresses/{contact}', 'AddressesController@index')->name('addresses');
    Route::get('addresses/{contact}/create', 'AddressesController@create')->name('addresses.create');
    Route::post('addresses/{contact}/create', 'AddressesController@store')->name('addresses.store');
    Route::get('addresses/{address}/edit', 'AddressesController@edit')->name('addresses.edit');
    Route::post('addresses/{address}/update', 'AddressesController@update')->name('addresses.update');

    Route::get('orders/{sortBy?}/{direction?}', 'OrderController@index')->name('orders');
    Route::get('order/create', 'OrderController@create')->name('orders.create');
    Route::post('order/create', 'OrderController@store')->name('orders.store');
    Route::get('order/{order}/edit', 'OrderController@edit')->name('orders.edit');
    Route::post('order/{order}/update', 'OrderController@update')->name('orders.update');
});

Route::get('/home', 'HomeController@index')->name('home');
