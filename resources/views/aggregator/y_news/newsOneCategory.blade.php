@extends('layouts.aggregator')

@section('content')
    <section class="main_order_data">
        <h3 class="h3_categories">{!!$category!!}</h3>
        <div class="main_categories_news_list">
            @foreach($news as $item)
                <a href="{{$item['link']}}"
                   class="category_news" target="_blank">{{$item['title']}} <span>(подробнее...)</span></a>
                <p class="briefly_news">{!! $item['description'] !!}</p>
                <p class="briefly_news">{{$item['pubDate']}}</p>
                <br><hr>
            @endforeach
        </div>
    </section>


@endsection