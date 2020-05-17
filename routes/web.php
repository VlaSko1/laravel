<?php

use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');

Route::get('/', 'IndexController@index') -> name('about');
Route::get('/experience', 'IndexController@experience') -> name('experience');
Route::get('/education', 'IndexController@education') -> name('education');
Route::get('/skills', 'IndexController@skills') -> name('skills');
Route::get('/interests', 'IndexController@interests') -> name('interests');
Route::get('/awards', 'IndexController@awards') -> name('awards');

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

    Route::get('/auth.html', 'Aggregator\IndexController@getIndexAuth') -> name('auth');
    Route::post('/auth.html', 'Aggregator\IndexController@checkAuth') ->name('checkAuth');
    Route::get('/admin/add_news.html', 'Aggregator\AdminController@indexAddNews') -> name('adminIndexAdd');
    Route::post('/admin/add_news.html', 'Aggregator\AdminController@addNews') -> name('addNews');
});
