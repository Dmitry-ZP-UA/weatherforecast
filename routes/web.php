<?php

Route::get('/', 'HomeController@index')->name('home');

Route::post('/search', 'HomeController@index')->name('search.city');

