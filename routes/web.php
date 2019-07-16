<?php

Route::get('/', 'PostController@index');

Route::get('/post/{post}', 'PostController@show');

Route::get('/contact', function () {
    return view('contact');
});
