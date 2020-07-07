<?php

namespace App\Http\Controllers\Aggregator;

use App\Http\Controllers\Controller;
use App\Http\Requests\AggregatorFeedbackRequest;
use App\Http\Requests\AggregatorOrderRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\FileDbService;
use App\Models\Aggregator;

class IndexController extends Controller
{
    protected $categories = [];
    protected $news = [];
    protected $feedbackAdd = null;
    protected $orderMake = null;
    public function __construct()
    {


    }
    public function getIndexAuth() {
        return view('aggregator.auth');
    }

    public function checkAuth(Request $request)
    {
        $all = $request->all();
        $loginAuth = $all['login'];
        $pass = $all['password'];
        $save = $all['password'];
        $submitOn = $all['submin_on'];


        return redirect()->route('auth');

    }

    public function getCategories() {
        $objAggregator = new Aggregator();
        $categories = $objAggregator->allCategories();

        return view('aggregator.listCategories', [
            'categories' => $categories
        ]);
    }
    public function getCategory(int $id) {
        $objAggregator = new Aggregator();
        $category = $objAggregator->issetCategory($id);
        if(!$category) {
            return abort(404);
        }
        $newsCategory = $objAggregator->getNewsFromCategory($id);

        return view('aggregator.category', [
            'newsCategory' => $newsCategory,
            'category' => $category->category
        ]);
    }

    public function getNews(int $id, int $idn) {
        $objNews = new Aggregator();
        $news = $objNews->getOneNews($idn);
        if(empty($news)) {
            return abort(404);
        }

        return view('aggregator.news', [
            'news' => $news[0],
            'categoryId' => $news[0]->category_id,
            'nameCategory' => $news[0]->category,
        ]);
    }

    public function indexFeedback()
    {
        return view('aggregator.feedback');
    }
    public function addFeedback(AggregatorFeedbackRequest $request)
    {
        $data = $request->only(['name', 'feedback']);
        if((new FileDbService())->saveFileFeedback($data)){
            $this->feedbackAdd = 1;
        }


        return view('aggregator.feedback', [
            'feedbackAdd' => $this->feedbackAdd
        ]);
    }
    public function indexOrderData()
    {
        return view('aggregator.orderData', [
            'categories' => $this->categories
        ]);
    }
    public function makeOrderData(AggregatorOrderRequest $request)
    {
        $data = $request->only(['name', 'phone', 'email', 'category']);
        if((new FileDbService()) -> saveFileOrder($data)) {
            $this->orderMake = 1;
        };


        return view('aggregator.orderData', [
            'categories' => $this->categories,
            'orderMake' => $this->orderMake
        ]);

    }
}
