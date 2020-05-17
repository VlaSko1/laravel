<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class IndexController extends Controller
{
    protected $articles = [];
    public function __construct()
    {
        $this->articles = [
            'Я первая статья',
            'Я вторая статья',
            'Я просто статья'
        ];


    }

    public function listArticles()
    {

        return view('articles.listArticles', [
            'articles' => $this->articles
        ]);

    }
    public function getArticle(int $id)
    {
        if(!isset($this->articles[$id])) {
            return abort(404);
        }

        $randChar = mt_rand(1, 4);
        $date = Carbon::now();

        return view('articles.article', [
            'char' => $randChar,
            'date' => $date,
            'article' => $this->articles[$id]
        ]);
    }

    public function saveArticle(Request $request)
    {
        $all = $request->all();
        $article = $all['article'];

        $this->articles[] = $article;
        return redirect()->route('articles');
    }

}
