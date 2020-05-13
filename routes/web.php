<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['prefix' => 'admin'], function() {


    Route::get('/articles.html', 'Articles\IndexController@listArticles')
        ->name('articles');
    Route::get('/articles/{id}.html', 'Articles\IndexController@getArticle')
        ->name('article');

    Route::post('/articles.html', 'Articles\IndexController@saveArticle');

});

Route::group(['prefix' => 'aggregator'], function() {

    Route::view('/index.html', 'aggregator.index') -> name('index');
    Route::get('/categories.html', 'Aggregator\IndexController@getCategories') -> name('categories');
    Route::get('/category/{id}.html', 'Aggregator\IndexController@getCategory') -> name('category');
    Route::get('/category/{id}/new{idn}.html', 'Aggregator\IndexController@getNews') -> name('news');

    Route::get('/auth.html', 'Aggregator\AuthController@getIndex') -> name('auth');
    Route::post('/auth.html', 'Aggregator\AuthController@checkAuth') ->name('checkAuth');
    Route::get('/admin/add_news.html', 'Aggregator\AdminController@indexAddNews') -> name('adminIndexAdd');
    Route::post('/admin/add_news.html', 'Aggregator\AdminController@addNews') -> name('addNews');
});
