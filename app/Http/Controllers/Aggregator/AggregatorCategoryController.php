<?php

namespace App\Http\Controllers\Aggregator;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class AggregatorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('aggregator.categories.listCategories',
            [
                'categories' => $categories
            ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aggregator.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $request->input('category');


        $category = Category::create([
            'category' => $category
        ]);
        if($category){
            return redirect()->route('categories.index')
                ->with('success', 'Категория успешно добавлена.');
        }

        return back()->with('error', 'Не удалось добавить категорию.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        $news = News::all()->where('category_id', '=', $category->id);

        return view('aggregator.categories.category', [
           'category' => $category,
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('aggregator.categories.edit', [
           'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->category = $request->input('category');

        if($category->save()) {
            return redirect()->route('categories.index')
                ->with('success', 'Категория успешно изменена.');
        }

        return back()->with('error', 'Не удалось изменить данные.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        if($category->delete()) {
            return redirect()->route('categories.index')
                ->with('success', 'Категория успешно удалена.');
        }
        return back()->with('error', 'Не удалось изменить категорию');

    }
}
