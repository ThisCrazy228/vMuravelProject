<?php

use Illuminate\Support\Facades\Route;

Route::get('ajax',function(){
    return view('comment');
});
Route::post('/getmsg','AjaxController@index');

Route::get('/', 'CategoriesController@showPage')->name('categories-page');
Route::get('/posts/{id}', 'PostsController@showPage')->name('posts-page');
Route::get('/post/{ids}', 'PostsController@showPostPage')->name('post-page');

Route::get('/cc', 'CategoriesController@showCreatePage')->name('create-category-page');
Route::get('/ec/{id}', 'CategoriesController@showEditPage')->name('edit-category-page');

Route::get('/cp/{id}', 'PostsController@showCreatePage')->name('create-post-page');
Route::get('/ep/{id}', 'PostsController@showEditPage')->name('edit-post-page');

Route::post('/cc', 'CategoriesController@createCategory')->name('create-category');
Route::post('/ec/{id}', 'CategoriesController@editCategory')->name('edit-category');
Route::get('/dc/{id}', 'CategoriesController@deleteCategory')->name('delete-category');

Route::post('/cp/{id}', 'PostsController@createPost')->name('create-post');
Route::post('/ep/{ids}', 'PostsController@editPost')->name('edit-post');
Route::get('/dp/{id}', 'PostsController@deletePost')->name('delete-post');
