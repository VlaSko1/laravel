<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News1;
use Illuminate\Http\Request;

class News1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$news = News1::all();

       $news = News1::where('status', 'published')->Orwhere('status', 'draft')->paginate(10);
       // dd($news);
       return view('news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = News1::create($request->all());
        if($news) {
            return redirect()->route('news.index')
                ->with('success', 'Новость успешно добавлена');
        }
        return back()
            ->with('error', 'Не удалось добавить новость');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News1  $news1
     * @return \Illuminate\Http\Response
     */
    public function show(News1 $news1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News1  $news1
     * @return \Illuminate\Http\Response
     */
    public function edit(News1 $news1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News1  $news1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News1 $news1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News1  $news1
     * @return \Illuminate\Http\Response
     */
    public function destroy(News1 $news1)
    {
        //
    }
}
