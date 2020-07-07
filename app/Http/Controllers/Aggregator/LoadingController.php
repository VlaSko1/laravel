<?php

namespace App\Http\Controllers\Aggregator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class LoadingController extends Controller
{
    public function loadData(Request $request)
    {
        //получаем данные из формы
        $dataRequest = $request->input('orderList');

        //обращаясь к модели получаем ссылку для парсинга
        $linkXml = (new Order())->getLinkParse($dataRequest);
        $xml = \XmlParser::load($linkXml);

        //обращаясь к модели находим соответствующий метод парсинга
        $parsMethod = (new Order())->getParsMethod($dataRequest);

        //парсим данные используя полученные метод
        $data = (new Order())->$parsMethod($xml);

        //обращаясь к модели получаем нужную вьюху для отображения информации
        $view = (new Order())->getView($dataRequest);


        return view("aggregator.order.{$view}", [
            'data' => $data
        ]);
    }
}
