<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/{name}', function ($name) {
    echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>Primer</title>
</head>
<body>
<header>
    <p>Страница создана для ознакомления с возможностями фреймворка Laravel.</p>
    <nav class=\"menu\">
        <ul>
            <li><a href=\"#\">link1</a></li>
            <li><a href=\"#\">link2</a></li>
            <li><a href=\"#\">link3</a></li>
            <li><a href=\"#\">link4</a></li>
            <li><a href=\"#\">link5</a></li>
            <li><a href=\"#\">link6</a></li></ul>
    </nav>
</header>
<main><p>Привет, {$name}</p></main>
<footer></footer>

</body>
</html>";
});
