<?php

namespace App\Http\Controllers\Articles;

use App\Http\Requests\ArtisanRequest;
use Dotenv\Exception\ValidationException;
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

        /*$randChar = mt_rand(1, 4);
        $date = Carbon::now();

        return view('articles.article', [
            'char' => $randChar,
            'date' => $date,
            'article' => $this->articles[$id]
        ]);*/
        return view('articles.article', [
            'article' => $this -> articles[$id]
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
