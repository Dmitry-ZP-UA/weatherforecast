<?php

Route::get('/', 'HomeController@index')->name('home');

Route::post('/', 'HomeController@search')->name('search.city');

Route::get('{name_city}', 'HomeController@search')->name('forecast');



