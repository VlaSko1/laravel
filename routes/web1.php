<?php

$text = "Моя первая страница";
$title = 'Привет Мир!';




Route::get('text', function ($text, $title) {
    echo $text . $title;
});
