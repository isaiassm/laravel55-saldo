<?php


$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('transfer', 'BalanceController@transfer')->name('balance.transfer');
    Route::post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');

    Route::get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');
    Route::post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');

    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('balance', 'BalanceController@index')->name('admin.balance');
    Route::get('deposit', 'BalanceController@deposit')->name('balance.deposit');
    Route::post('deposit', 'BalanceController@depositStore')->name('deposit.store');
    
});

Route::get('/','Site\SiteController@index');
//a contra barra esta indicando aonde esta a controller



Auth::routes();

