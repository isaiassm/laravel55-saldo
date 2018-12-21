<?php


$this->group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){
    Route::get('admin', 'AdminController@index')->name('admin.home');
});

Route::get('/','Site\SiteController@index');
//a contra barra esta indicando aonde esta a controller



Auth::routes();

