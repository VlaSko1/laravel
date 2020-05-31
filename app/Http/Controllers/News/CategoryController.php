<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category1;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category1::all();
        return view('news.categories.index',
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
        return view('news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $slug = $request->input('slug');

        $category = Category1::create([
            'title' => $title,
            'slug' => $slug
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
     * @param  \App\Models\Category1  $category1
     * @return \Illuminate\Http\Response
     */
    public function show(Category1 $category1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category1  $category1
     * @return \Illuminate\Http\Response
     */
    public function edit(Category1 $category)
    {

        return view('news.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category1  $category1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category1 $category)
    {
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');

        if($category->save()) {
            return redirect()->route('categories.index')
                ->with('success', 'Категория успешно обновлена.');
        }

        return back()->with('error', 'Не удалось обновить данные.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category1  $category1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category1 $category)
    {
        try{
            $category->delete();
        }catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
