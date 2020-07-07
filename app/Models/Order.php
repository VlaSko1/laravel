<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $loadListPage = [
        'Курс валют ЦБ РФ',
        'Яндекс.Новости: Армия и оружие'
    ];

    public $loadingDataList = [
        'Курс валют ЦБ РФ' => [
            'https://www.cbr-xml-daily.ru/daily_utf8.xml',
            'getCbrData',
            'valute'
        ],
        'Яндекс.Новости: Армия и оружие' => [
            'https://news.yandex.ru/army.rss',
            'getYandexWeaponsNews',
            'yWeapons'
        ]
     ];
    public function getLinkParse($data)
    {
        return $this->loadingDataList[$this->loadListPage[$data]][0];
    }

    public function getParsMethod($data)
    {
        return $this->loadingDataList[$this->loadListPage[$data]][1];
    }


    public function getCbrData($dataXml)
    {
        $data = $dataXml->parse([
            'valute'  => ['uses' => 'Valute[NumCode,CharCode,Nominal,Name,Value]']
        ]);
        return $data = $data['valute'];
    }
    public function getView($dataRequest)
    {
        return $this->loadingDataList[$this->loadListPage[$dataRequest]][2];
    }

    public function getYandexWeaponsNews($dataXml)
    {
        $data = $dataXml->parse([
                'title' => ['uses' => 'channel.title'],
                'link' => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'lastBuildDate' => ['uses' => 'channel.lastBuildDate'],
                'news' => ['uses' => 'channel.item[title,link,description,pubDate]']
        ]);

        // Сортируем массив с новостями по убыванию, используя сортировку пузырьком
        $countForSort = count($data['news']) - 1;
        while(true) {
            if($countForSort === 1) break;
            for($i = 0; $i < $countForSort; $i++) {
                if(strtotime($data['news'][$i]['pubDate']) <
                    strtotime($data['news'][$i + 1]['pubDate'])){
                    $tempSort = $data['news'][$i]['pubDate'];
                    $data['news'][$i]['pubDate'] = $data['news'][$i + 1]['pubDate'];
                    $data['news'][$i + 1]['pubDate'] = $tempSort;
                }
            }
            $countForSort--;
        }

        // обрезаем часть даты: " -0000"
        for($i = 0; $i < count($data['news']); $i++) {
            $data['news'][$i]['pubDate'] = substr($data['news'][$i]['pubDate'], 0, -6);
        }
        return($data);
    }
}
