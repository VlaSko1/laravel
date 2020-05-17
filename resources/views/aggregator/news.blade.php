@extends('layouts.aggregator')
@section('content')
    <div class="container">
        <section class="main_categories">
            <h3 class="h3_categories">{{$news['name']}}</h3>
            <p class="detail_news">
                {{$news['detail']}}
            </p>
            <a href="{{route('category', ['id' => $categoryId])}}" class="return_category">Вернуться к новостям категории {{$nameCategory}}</a>
        </section>
    </div>
@endsection
