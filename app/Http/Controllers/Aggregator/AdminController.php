<?php

namespace App\Http\Controllers\Aggregator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $categories = [];
    public function __construct()
    {
        $this->categories = [
            'Политика',
            'Спорт',
            'Наука',
            'Экономика',
            'Общество'
        ];
    }

    public function indexAddNews() {
        return view('aggregator.addNews', [
            'categories' => $this->categories
        ]);
    }
    public function addNews(Request $request){
        $all = $request->all();
        $name = $all['name_news'];
        $briefly = $all['briefly'];
        $detail = $all['detail'];
        $category = $all['category'];
        $sub_news_on = $all['sub_news_on'];

        return redirect()->route('adminIndexAdd');
    }
}
