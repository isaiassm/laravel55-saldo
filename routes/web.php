<?php


$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('balance', 'BalanceController@index')->name('admin.balance');
    
});

Route::get('/','Site\SiteController@index');
//a contra barra esta indicando aonde esta a controller



Auth::routes();

