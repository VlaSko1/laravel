@extends('layouts.aggregator')
@section('content')
    <section class="main_categories">
        <h3 class="h3_categories">Новости из раздела "{{$category}}"</h3>
        <div class="main_categories_news_list">
            @foreach($newsCategory as $key => $value)
                <a href="{{route('news', ['id' => $value->category_id, 'idn' => $value->id])}}"
                   class="category_news">{{$value->name}} <span>(подробнее...)</span></a>
                <p class="briefly_news">{{$value->briefly}}</p>
            @endforeach
        </div>
    </section>
@endsection
