<?php

Route::get('/', function() { return redirect()->route('posts.index'); })->name('home');

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');
