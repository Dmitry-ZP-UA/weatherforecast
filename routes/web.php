<?php

Route::get('/', 'HomeController@index')->name('home');

Route::post('/', 'HomeController@search')->name('search.city');

Route::post('search', 'SearchController@index')->name('search');

Route::get('/{cityId}', 'HomeController@show')->name('forecast');

Route::post('/ajaxSearch', 'AjaxController@index')->name('ajaxPostSearchCity');






