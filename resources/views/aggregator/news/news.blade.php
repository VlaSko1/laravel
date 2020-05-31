@extends('layouts.aggregator')
@section('content')
    <section class="main_categories">
        <h3 class="h3_categories">{{$news->name}}</h3>
        <p class="detail_news">
            {{$news->detail}}
        </p>
        <a href="{{route('categories.show', ['category' => $category])}}" class="return_category">Вернуться к новостям категории {{$category->category}}</a>
    </section>
@endsection
