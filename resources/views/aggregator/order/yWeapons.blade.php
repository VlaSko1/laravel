@extends('layouts.aggregator')

@section('content')
    <section class="main_order_data">
        <h3 class="h3_categories">{{$data['title']}}</h3>
        <div class="main_categories_news_list">
            @foreach($data['news'] as $news)
                <a href="{{$news['link']}}"
                   class="category_news" target="_blank">{{$news['title']}} <span>(подробнее...)</span></a>
                <p class="briefly_news">{{$news['description']}}</p>
                <p class="briefly_news">{{$news['pubDate']}}</p>
                <br><hr>
            @endforeach
        </div>
    </section>


@endsection
