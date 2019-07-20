<?php

Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');

Route::resource('/posts', 'PostController');
Route::post('/posts/{post}/comments', 'CommentController@store')->name('comments.store');
/* Route::resource('/posts', 'PostController') is the same as all the lines bellow */
//Route::get('/posts', 'PostController@index')->name('posts.index');
//Route::post('/posts', 'PostController@store')->name('posts.store');
//Route::get('/posts/create', 'PostController@create')->name('posts.create');
//Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
//Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');
//Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
//Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');

