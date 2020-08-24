<?php

use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');

// Реализация примера загрузки файла (в продакшене удали)
Route::get('/upload_file', 'UploadController@index')->name("upload_index");
Route::post('/upload_file_save', 'UploadController@save')->name("upload_save");

// Конец реализации примера загрузки файла (не забудь удалить в продакшене)

Route::get('/', 'IndexController@index') -> name('about');
Route::get('/experience', 'IndexController@experience') -> name('experience');
Route::get('/education', 'IndexController@education') -> name('education');
Route::get('/skills', 'IndexController@skills') -> name('skills');
Route::get('/interests', 'IndexController@interests') -> name('interests');
Route::get('/awards', 'IndexController@awards') -> name('awards');
Route::get('/image', 'Articles\IndexController@getProfileImage');


Route::group(['middleware'=> 'auth'], function() {
    // For auth routes


    // For admin routes
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
        Route::get('/', function () {
            echo "Привет, я админ";
        })->name('admin');

        Route::get('/articles.html', 'Articles\IndexController@listArticles')
            ->name('articles');
        Route::get('/articles/{id}.html', 'Articles\IndexController@getArticle')
            ->name('article');

        Route::post('/articles.html', 'Articles\IndexController@saveArticle');

        //news
        Route::resource('/categories', 'News\CategoryController');
        Route::resource('/news', 'News\News1Controller');

    });

});


Route::group(['prefix' => 'aggregator'], function() {

    Route::view('/index.html', 'aggregator.index') -> name('index');
    Route::resource('/categories', 'Aggregator\AggregatorCategoryController');
    Route::resource('/feedback', 'Aggregator\FeedbackController');
    Route::resource('/news', 'Aggregator\NewsController');
    Route::resource('/order', 'Aggregator\OrderController');


    Route::get('/category/{id}/new{idn}.html', 'Aggregator\IndexController@getNews') -> name('news');

    Route::get('/auth.html', 'Aggregator\IndexController@getIndexAuth') -> name('auth');
    Route::post('/auth.html', 'Aggregator\IndexController@checkAuth') ->name('checkAuth');
    Route::get('/admin/add_news.html', 'Aggregator\AdminController@indexAddNews') -> name('adminIndexAdd');
    Route::post('/admin/add_news.html', 'Aggregator\AdminController@addNews') -> name('addNews');
    Route::resource('/resource', 'Aggregator\ResourceController');


    Auth::routes();

    //networks
    Route::get('/auth/vk', 'Auth\VkController@login')->name('vk.login');
    Route::get('/auth/callback', 'Auth\VkController@response')->name('vk.callback');
    Route::get('/auth/fb', 'Auth\FacebookController@login')->name('fb.login');
    Route::get('/auth/fb_callback', 'Auth\FacebookController@response')->name('fb.callback');

    //для загрузки курса валют и новостей Яндекс Оружие
    Route::post('/loading_data', 'Aggregator\LoadingController@loadData')->name('loadData');

    //для получения новостей яндекс наука и сохранения их в БД,
    Route::get('/yandex_science_css', 'Aggregator\YScienceController@showNews')->name('yScience');

    //для получения всех новостей яндекса и сохранения их в БД
    Route::get('/yandex_news', 'Aggregator\YNewsController@showCategoryYNews')->name('YNewsCategories');
    //для получения отдельной категории яндекс новостей и её отображения
    Route::get('/yandex_category_news/{id}', 'Aggregator\YNewsController@showOneCategoryNews')->name('oneCategoryNews');



    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/aggregator/index.html');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'adminCheck'], function() {
       Route::match(['post', 'get'], '/profile', 'Aggregator\AdminProfileController@index')->name('adminProfileIndex');
       Route::get('/profile/{id}/edit', 'Aggregator\AdminProfileController@edit')->name('adminProfileEdit');
       Route::post('/profile/delete', 'Aggregator\AdminProfileController@delete')->name('adminProfileDelete');
        Route::post('/profile/update', 'Aggregator\AdminProfileController@update')->name('adminProfileUpdate');
    });


});



//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/test', function () {
    $xml = \XmlParser::load('https://news.yandex.ru/army.rss');

    //dd($xml);
    $item = $xml->parse([
        'title'=>['uses' => 'channel.title'],
        'link' => ['uses' => 'channel.link'],
        'description' => ['uses' => 'channel.description'],
        'lastBuildDate' => ['uses' => 'channel.pubDate'],
        'news' => ['uses' => 'channel.item[title,link,description,pubDate]']
    ]);
    dd($item);
});
Route::get('/logout', function () {
   Auth::logout();
   return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Контроллер для тестового добавления job на уроке №10
Route::get('/news/rss', 'Articles\TestController@news');
