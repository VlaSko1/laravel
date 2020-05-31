<?php

namespace App\Http\Controllers\Aggregator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('aggregator.news.addNews', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request->input('name');
        $detail = $request->input('detail');
        $briefly = $request->input('briefly');
        $published = $request->input('published');
        $category_id = $request->input('category_id');
        $source_id = rand(1, 10);

        $news = News::create([
            'name' => $name,
            'detail' => $detail,
            'briefly' => $briefly,
            'published' => $published,
            'category_id' => $category_id,
            'source_id' => $source_id,
        ]);
        if($news) {
            return redirect()->route('news.create')
                ->with('success', 'Новость успешно добавлена.');
        }
        return back()->with('error', 'Не удалось добавить новость.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $category = Category::all()->find($news->category_id);

        return view('aggregator.news.news', [
            'category' => $category,
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('aggregator.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->name = $request->input('name');
        $news->detail = $request->input('detail');
        $news->briefly = $request->input('briefly');
        $news->published = $request->input('published');
        $news->category_id = $request->input('category_id');
        $news->source_id = rand(1, 10);
        $category = Category::all()->find($news->category_id);
        $newsCategory = News::all()->where('category_id', '=', $news->category_id);

        if($news->save()) {
            return redirect()->route('categories.show', [
                'category' => $category,
                'news' => $newsCategory
            ])->with('success', 'Новость успешно изменена.');
        }

        return back()->with('error', 'Не удалось изменить новость.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $category = Category::all()->find($news->category_id);
        if($news->delete()) {

            return redirect()->route('categories.show', [
                'category' => $category
            ])->with('success', 'Новость успешно удалена.');
        }
        return back()->with('error', 'Не удалось удалить новость');
    }
}
