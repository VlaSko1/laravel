<?php

namespace App\Http\Controllers\Articles;

use App\Http\Requests\ArtisanRequest;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Article;

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
        $objArticle = new Article();
        $articles = $objArticle->allArticles();
        $countArticles = $objArticle->getCount();

        return view('articles.listArticles', [
            'articles' => $articles,
            'countArticles' => $countArticles
        ]);

    }
    public function getArticle(int $id)
    {
        $objArticle = new Article();
        $article = $objArticle->getArticleById($id);

        if(!$article) {
            return abort(404);
        }


        return view('articles.article', [
            'article' => $article
        ]);
    }

    public function saveArticle(ArtisanRequest $request)
    {
        $title = $request->input('title');
        $date = $request->input('created_at');
        $text = $request->input('text', 'Hello world');

        $insert = \DB::table('articles')
            ->insert([
               'title' => $title,
               'text' => $text
            ]);


        return redirect()->route('articles');
    }
    public function getProfileImage()
    {
        return response()->download(public_path('/img/profile.jpg'));
    }


}
